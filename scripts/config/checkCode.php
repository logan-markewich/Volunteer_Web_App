<?php
require('database.php');

$message="";
if(count($_POST)>0) {
	
	/*$result = mysqli_query($conn,"SELECT * FROM cmpt370_rdynam.users WHERE e_mail='" . $_POST["email"] . "' and password = '". $_POST["pwd"]."'");
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
	echo $message;*/
						$sql = ("SELECT * FROM cmpt370_rdynam.events WHERE accessCode='" . $_POST["accessCode"] . "'");
						$result = mysqli_query($conn, $sql);
						if ($result) {
							while($row = $result -> fetch_assoc()){
								echo '<div id="eventBtns">';
								echo '<a href="eventOverview.php?id='; echo $row['idEvent']; echo '" id="eventBtn" type="button" class="btn btn-primary btn-block">';
								echo "<h3>";
								echo nl2br (strtoupper($row['eventName'])." | ".date('M j, Y',strtotime($row['startDate']))." - ".date('M j, Y',strtotime($row['endDate'])));
								echo "</h3>";
								echo "</a>";
								echo "</div>";
							}
						}
						else{
							alert("This code does not exist, redirecting to homepage.");
							header("Location: ../../index.php");
						}
}

						$sql = ("SELECT * FROM cmpt370_rdynam.events WHERE accessCode='" . $_POST["accessCode"] . "'");
						$result = mysqli_query($conn, $sql);
						if ($result) {
							while($row = $result -> fetch_assoc()){
								echo '<div id="eventBtns">';
								echo '<a href="eventOverview.php?id='; echo $row['idEvent']; echo '" id="eventBtn" type="button" class="btn btn-primary btn-block">';
								echo "<h3>";
								echo nl2br (strtoupper($row['eventName'])." | ".date('M j, Y',strtotime($row['startDate']))." - ".date('M j, Y',strtotime($row['endDate'])));
								echo "</h3>";
								echo "</a>";
								echo "</div>";
							}
						}
						else{
							alert("This code does not exist, redirecting to homepage.");
							header("Location: ../../index.php");
						}
					
?> 