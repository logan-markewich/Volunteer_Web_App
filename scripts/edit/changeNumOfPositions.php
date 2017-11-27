<?php
require('../config/database.php');
session_start();

$table_name = str_replace(' ', '', $_SESSION["eventName"]);

$sql = "UPDATE 
		
		". $table_name ."
		
		SET number_of_volunteers = '" . $_POST["numOfPostions"] . " '
						
		WHERE idShift = ".$_SESSION['shift_id']."
		
		 ";



						
						

if (mysqli_query($conn, $sql)) {
    header("Location: ../../eventOverview.php?id=".$_SESSION['id']);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 



