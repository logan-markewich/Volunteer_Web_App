// This script checks that an access code relates to an event in the database.
// If the event is in the databse, it redirects the volunteer to its shifts page
// Otherwise, it's an error.

<?php
require('database.php');

$message="";
//if(count($_POST)>0) {
	
	$access = $_POST['accessCode'];
	$result = mysqli_query($conn,"SELECT * FROM cmpt370_rdynam.events WHERE accessCode='" . $access . "'");
	
	$count  = mysqli_num_rows($result);
	$_SESSION["conn"] = $conn;
	if($count==0) {
		$message = "Invalid Access Code!";
	} else {
		
		session_id($access);
		session_start();
		$_SESSION['accessCode'] = $access;
		$id = mysqli_query($conn,"SELECT idEvent FROM cmpt370_rdynam.events WHERE accessCode='" . $access ."'")->fetch_object()->idEvent;
	
		header("Location: ../../shiftsSignUp.php?id=".$id);

	}
	echo $message;
//}
//else echo $message;
					
?> 
