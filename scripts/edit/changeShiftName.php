<?php
require('../config/database.php');
session_start();

$table_name = str_replace(' ', '', $_SESSION["eventName"]);
echo $table_name;

$sql = "UPDATE". $table_name." SET shift_position = '" . $_POST["changeName"] . "' 
						where idShift = '" . $GET['id'] . "' ";

if (mysqli_query($conn, $sql)) {
header("Refresh:0");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 