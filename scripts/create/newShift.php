// This script takes the data from the shift form and creates a new shift in the table for the proper event

<?php
require('../config/database.php');
session_start();

$table_name = str_replace(' ', '', $_SESSION["eventName"]);
echo $table_name;



$sql = "INSERT INTO `". $table_name ."` (shift_location, shift_position, start_Time, end_Time, date_Time, number_of_volunteers, number_of_volunteers_in, number_of_volunteers_left)
VALUES ('" . $_POST["location"] . "',  '" . $_POST["position"] . "', '" . $_POST["startTime"] . "','" . $_POST["endTime"] . "', '" . $_POST['date'] . "','" . $_POST["number_of_vol"] . "', 
0, '" . $_POST["number_of_vol"] . "' )";



if (mysqli_query($conn, $sql)) {
    header("Location: ../../dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>



