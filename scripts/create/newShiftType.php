// This script adds a new shift type title for a corresponding event in our database

<?php
require('../config/database.php');
session_start();

$sql = "INSERT INTO shift_descriptions (shiftType, eventName)
VALUES ('" . $_POST["shiftType"] . "', '" . $_SESSION['eventName']."')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../../shiftTypes.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);



?>

