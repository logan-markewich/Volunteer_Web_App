<?php session_start(); 
require('database.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hollandia Volunt-EZ</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="/css/main.css" />
	<link rel="stylesheet" href="/css/menu.css" />
	<link rel="stylesheet" href="/css/hdr_ftr.css" />
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php	if($_SESSION["username"] == NULL){
			header("Location: index.php");
		}
		?>
<body>
	<!-- Page Header Information -->
	<div class="container-fluid" id="contain" >
		<div id="hdr">
			<div id="social">
				<a href="https://www.facebook.com/hollandiasoccer" target="_blank">			
					<img src="img/fb.png" />
				</a>
				<a href="https://www.instagram.com/hollandiasoccer/" target="_blank">		
					<img src="img/ig.png" >
				</a>
				<a href="https://www.youtube.com/channel/UCeyZXkqKTUyNs0S_tCL9QFw" target="_blank">
					<img src="img/yt.png" >
				</a>
				<a href="https://twitter.com/HollandiaSoccer" target="_blank">
					<img src="img/tw.png" >
				</a>
			</div>
		</div>
			<div class="clr"></div>
	<div id="mnu">
	<? include("menu.php"); ?>
	</div>
		
		<div class="row" id="Main">
			<div class="col-sm-4">
			<h1 align="left"> Welcome, <?php echo($_SESSION["name"]); ?> <h1>
			<!-- Create Event Form -->
			<form name="create" action="/createEvent.php">
			<button id="createEvent" type="submit" class="btn btn-default">Create Event</button>
			</form>
			<!-- Logout Form -->
		<form name="logout" action="/logout.php">
			<button id="logout" type="submit" class="btn btn-default">Logout</button>
		</form>
			</div>
		<div>
		<!-- Display Owned Events -->
		<h2> My Events </h2>
		<h3>
		<?php 
		$sql = ("SELECT * FROM cmpt370_rdynam.events WHERE eventCreator='" . $_SESSION["email"] . "'");
		$result = mysqli_query($conn, $sql);
		if ($result) {
			while($row = $result -> fetch_assoc()){
				echo nl2br ($row['eventName']." \n");
			}

		}
		?>
		</h3>
		</div>
		</div>
		<!-- Footer Information -->
		<div class="col-sm-12" id="ftr">
        	<center>
        		<div id="mob-social">
					<a href="https://www.facebook.com/hollandiasoccer" target="_blank"><img src="img/fb.png" /></a><a href="https://twitter.com/HollandiaSoccer" target="_blank"><img src="img/tw.png" ></a><a href="https://www.instagram.com/hollandiasoccer/" target="_blank"><img src="img/ig.png" ></a><a href="https://www.youtube.com/channel/UCeyZXkqKTUyNs0S_tCL9QFw" target="_blank"><img src="img/yt.png" ></a>
				</div>
				<p>
					<strong>Purpose</strong>: <em>Enhancing our community by inspiring people to enrich their lives through soccer</em><br />
					<strong>Mission</strong>: <em>To inspire players, parents, and coaches to be passionate about soccer and to reach their full potential through player-centric programs</em><br />
            		<strong>Vision</strong>: <em>Hollandia will be the club of choice, building community and a membership which commits to behavior consistent with our values</em>
				</p>
        	<p><span>Copyright Hollandia Soccer Club; <? echo date("Y"); ?>  	All Rights Reserved.</span></p>
        </center>

	</div>
	</div>

</body>
</html>