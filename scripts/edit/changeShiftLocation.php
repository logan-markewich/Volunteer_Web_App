<?php
require('../config/database.php');
session_start();



$sql = "UPDATE 
		
		". $_SESSION["eventName"] ."
		
		SET shift_location = '" . $_POST["location"] . " '
						
		WHERE idShift = ".$_SESSION['shift_id']."
		
		 ";



						
						

if (mysqli_query($conn, $sql)) {
    header("Location: ../../eventOverview.php?id=".$_SESSION['id']);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 



