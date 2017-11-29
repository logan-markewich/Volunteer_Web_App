<?php
require('../config/database.php');
session_start();

$table_name = str_replace(' ', '', $_SESSION["eventName"]);
echo $table_name;



$sql = "INSERT INTO `". $table_name ."` (shift_location, shift_position, start_Time, end_Time, date_Time, number_of_volunteers, number_of_volunteers_in, number_of_volunteers_left)
VALUES ('" . $_POST["location"] . "',  '" . $_POST["position"] . "', '" . $_POST["startTime"] . "','" . $_POST["endTime"] . "', '" . $_POST['date'] . "','" . $_POST["number_of_vol"] . "', 
0, '" . $_POST["number_of_vol"] . "' )";



if (mysqli_query($conn, $sql)) {
    $sql3 = "update events set numShifts = numShifts + 1 where eventName = '". $_SESSION['eventName'] ."'";
	if (mysqli_query($conn, $sql3)) {
		header("Location: ../../dashboard.php");
	}
	else {
	    echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
	}
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>



