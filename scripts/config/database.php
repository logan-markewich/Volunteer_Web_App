// This script sets our connection to the database, so we don't have to type it every time

<?php

$servername = "db.cs.usask.ca";
$username = "cmpt370_rdynam";
$password = "j9mnyOSf1Ewbl8qLngHt";
$dbname = "cmpt370_rdynam";

$conn = mysqli_connect($servername,$username,$password,$dbname);

?>
