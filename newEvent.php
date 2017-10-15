<?php
require('database.php');
session_start();
$_SESSION["eventName"]=$_POST["eventName"];
$_SESSION["location"]=$_POST["location"];
$_SESSION["startDate"]=$_POST["startDate"];
$_SESSION["endDate"]=$_POST["endDate"];
$sql = "INSERT INTO events (eventName, eventCreator, startDate, endDate, location)
VALUES ('" . $_SESSION['eventName'] . "','" . $_SESSION['email'] . "', '" . $_SESSION['startDate'] . "', '" . $_SESSION['endDate'] . "', '" . $_SESSION['location'] . "')";

if (mysqli_query($conn, $sql)) {
    header("Location: dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 