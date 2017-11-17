<?php
require('../config/database.php');
session_start();

$table_name = $_SESSION['eventName'];
echo $table_name;



$sql = "INSERT INTO `" . $table_name ."` (shift_location, shift_position, start_Time, end_Time, date_Time, number_of_volunteers)
VALUES ('" . $_POST["location"] . "', '" . $_POST["position"] . "', '" . $_POST["startTime"] . "', '" . $_POST["endTime"] . "', '" . $_POST['date'] . "','" . $_POST["number_of_vol"] . "')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../../dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);



?>

