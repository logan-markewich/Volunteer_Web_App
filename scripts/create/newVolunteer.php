<?php
require('../config/database.php');
session_start();

$eventNameNoSpaces = str_replace(' ', '', $_SESSION["eventName"]);

$sql1 = "insert into volunteers (firstName, lastName, email, phoneNumber, idShift, eventName) values ('". $_POST["firstName"] ."', '". $_POST["lastName"] ."', '". $_POST["email"] ."', '". $_POST["phoneNumber"] ."', '". $_POST["shiftId"] ."', '". $_SESSION["eventName"] ."')";

if (mysqli_query($conn, $sql1)) {
	$sql2 = "update ". $eventNameNoSpaces ." set number_of_volunteers_in = number_of_volunteers_in + 1, number_of_volunteers_left = number_of_volunteers_left - 1 where idShift = ". $_POST["shiftId"] ."";
		if (mysqli_query($conn, $sql2)) {
			 header("Location: ../../dashboard.php");	
		}
		else {
			echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
		}
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?> 