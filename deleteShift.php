<?php
require('../config/database.php');
session_start();



$sql = "DELETE FROM " .$_SESSION["eventName"] . " WHERE shift_location = " .$_SESSION['shift_name'] . "";
// $sql = "DELETE FROM events WHERE eventName = '" . $_SESSION["eventName"] . "' ";

if (mysqli_query($conn, $sql)) {
    header("Location: ../../dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 


