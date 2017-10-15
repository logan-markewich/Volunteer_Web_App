<?php
require('database.php');

$_SESSION["firstName"]=$_POST["firstName"];
$_SESSION["lastName"]=$_POST["lastName"];
$_SESSION["email"]=$_POST["email"];
$_SESSION["username"]=$_POST["username"];
$_SESSION["password"]=$_POST["password"];
$sql = "INSERT INTO users (username, password, firstname, lastname, e_mail)
VALUES ('" . $_SESSION['username'] . "','" . $_SESSION['password'] . "', '" . $_SESSION['firstName'] . "', '" . $_SESSION['lastName'] . "', '" . $_SESSION['email'] . "')";

if (mysqli_query($conn, $sql)) {
    session_id($_SESSION["username"]);
	session_start();
	header("Location: dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?> 