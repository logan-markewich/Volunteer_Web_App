<?php
require('../config/database.php');
session_start();

$table_name = str_replace(' ', '', $_SESSION["eventName"]);
echo $table_name;

$sql = "UPDATE ". $table_name." SET shift_position = '" . $_POST["position"] . "' where idShift = '" . $_SESSION['shift_id'] . "' ";

if (mysqli_query($conn, $sql)) {
	header("Location: ../../shifts.php?id=".$_SESSION['id']);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 