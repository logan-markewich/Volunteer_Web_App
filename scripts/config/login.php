// This script takes the data a user used to log in, and confirms that the credentials are correct. If they are correct,
// It will log the user into their respective dashboard by using their session variables.

<?php
require('database.php');

$message="";
if(count($_POST)>0) {
	
	$result = mysqli_query($conn,"SELECT * FROM cmpt370_rdynam.users WHERE e_mail='" . $_POST["email"] . "' and password = '". $_POST["pwd"]."'");
	$count  = mysqli_num_rows($result);
	$_SESSION["conn"] = $conn;
	if($count==0) {
		$message = "Invalid Username or Password!";
	} else {
		$username = mysqli_query($conn,"SELECT username FROM cmpt370_rdynam.users WHERE e_mail='" . $_POST["email"]."'")->fetch_object()->username;
		session_id($username);
		session_start();
		$firstName = mysqli_query($conn,"SELECT firstName FROM cmpt370_rdynam.users WHERE e_mail='" . $_POST["email"]."'")->fetch_object()->firstName;
		$_SESSION["username"] = $username;
		$_SESSION["name"] = $firstName;
		$_SESSION["email"] = $_POST["email"];
	
		header("Location: ../../dashboard.php");

	}
	echo $message;
}
?> 
