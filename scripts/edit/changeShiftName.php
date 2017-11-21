<?php
require('../config/database.php');
session_start();

$sql = "UPDATE". $table_name." SET shift_position = '" . $_POST["changeName"] . "' 
						where idShift = '" . $GET['id'] . "' ";

if (mysqli_query($conn, $sql)) {
header("Refresh:0");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 