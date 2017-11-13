<?php
require('database.php');
session_start();

$sql = "UPDATE events SET startDate = '" . $_POST["startDate"] . "', 
						endDate = '" . $_POST["endDate"] . "' 
						where eventName = '" . $_SESSION["eventName"] . "' ";

if (mysqli_query($conn, $sql)) {
    header("Location: dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 
