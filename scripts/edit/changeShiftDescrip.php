// Update description for a shift at an event

<?php
require('../config/database.php');
session_start();

$sql = "UPDATE shift_descriptions SET shiftDescription='" . $_POST["description"] . "' where idShiftDescrip=" . $_POST["shiftID"] . " ";

if (mysqli_query($conn, $sql)) {
header("Location: ../../shiftTypes.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 
