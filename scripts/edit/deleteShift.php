// Script to delete a shift from a corresponding event

<?php
require('../config/database.php');
session_start();

$table_name = str_replace(' ', '', $_SESSION["eventName"]);
echo $table_name;

$sql = "DELETE FROM " 
		. $table_name 
		. " WHERE idShift = " .$_SESSION['shift_id'] . "";
			 
			 
// $sql = "DELETE FROM events WHERE eventName = '" . $_SESSION["eventName"] . "' ";

if (mysqli_query($conn, $sql)) {
    header("Location: ../../dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 


