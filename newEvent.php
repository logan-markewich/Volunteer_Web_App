<?php
require('database.php');
session_start();

$sql = "INSERT INTO events (eventName, eventCreator, startDate, endDate, location)
VALUES ('" . $_POST["eventName"] . "','" . $_SESSION['email'] . "', '" . $_POST["startDate"] . "', '" . $_POST["endDate"] . "', '" . $_POST["location"] . "')";

if (mysqli_query($conn, $sql)) {
    header("Location: dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 