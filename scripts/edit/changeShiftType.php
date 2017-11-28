<?php
require('../config/database.php');
session_start();

$table_name = 'shift_types';
echo $table_name;

$sql = "UPDATE 
		
		". $table_name ."
		
		SET description = '" . $_POST["description"] . " ',
		
		 type = '" . $_POST["type"] . " '
						
		WHERE idType = ".$_SESSION['idType']."
		
		 ";
				
// $sql = "UPDATE 
// 		
// 		". $table_name ."
// 		
// 		SET type = '" . $_POST["type"] . " '
// 						
// 		WHERE idType = ".$_SESSION['idType']."
// 		
// 		 ";


		
						

if (mysqli_query($conn, $sql)) {
    header("Location: ../../eventOverview.php?id=".$_SESSION['id']);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 



