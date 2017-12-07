// Script to change the date of a corresponding event

<?php
require('../config/database.php');
session_start();

$sql = "UPDATE events SET startDate = '" . $_POST["startDate"] . "', 
						endDate = '" . $_POST["endDate"] . "' 
						where eventName = '" . $_SESSION["eventName"] . "' ";

if (mysqli_query($conn, $sql)) {
    header("Location: ../../eventOverview.php?id=".$_SESSION['id']);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 
