<?php 
session_start(); 
require('./scripts/config/database.php');
$_GET['id'] = $_SESSION['id'];
$sql = ("SELECT * FROM cmpt370_rdynam.events WHERE idEvent='" . $_GET['id'] . "'");
$result = mysqli_query($conn, $sql);
$_SESSION['id'] = $_GET['id'];
while($row = $result -> fetch_assoc()){
$_SESSION["eventName"]=$row["eventName"];
$_SESSION["location"]=$row["location"];
$_SESSION["startDate"]=$row["startDate"];
$_SESSION["endDate"]=$row["endDate"];
$_SESSION["numShifts"]=$row["numShifts"];
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hollandia Volunt-EZ</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="/css/shifts.css" />
	<link rel="stylesheet" href="/css/main.css" />
	<link rel="stylesheet" href="/css/hdr_ftr.css" />
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
	
<body>
	<div class="container-fluid" id="contain">
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
		<!-- Php should make a row for every two events -->
		<div id="Main">
		<h1> <?php echo($_SESSION["eventName"]); ?> </h1> 
		<div class="row" id="shiftRow">
  			<div class="col-sm-6" id="shifts-left">
				<h2> <?php echo "Start Date: " ?> <?php echo($_SESSION["startDate"]); ?> </h2>
				<div id="shiftarea">
					<!-- Php should make a button for each shift -->
					<button id="shiftBtn" type="button" class="btn btn-primary btn-block">
						<h3>Shift time | Shift Position</h3>
						<h3># Postions left</h3>
					</button>
					<button id="shiftBtn" type="button" class="btn btn-primary btn-block">
						<h3>Shift time | Shift Position</h3>
						<h3># Positions left</h3>
					</button>
					<button id="shiftBtn" type="button" class="btn btn-primary btn-block">
						<h3>Shift time | Shift Position</h3>
						<h3># Positions left</h3>
					</button>
					<button id="shiftBtn" type="button" class="btn btn-primary btn-block">
						<h3>Shift time | Shift Position</h3>
						<h3># Position left</h3>
					</button>
				</div>
			</div>
			<div class="col-sm-6" id="shifts-right">
				<h2><?php echo "End Date: " ?> <?php echo($_SESSION["endDate"]); ?></h2>
				<div id="shiftarea">
					<button id="shiftBtn" type="button" class="btn btn-primary btn-block">
						<h3>Shift time | Shift Position</h3>
						<h3># Positions left</h3>
					</button>
					<button id="shiftBtn" type="button" class="btn btn-primary btn-block">
						<h3>Shift time | Shift Position</h3>
						<h3># Positions left</h3>
					</button>
					<button id="shiftBtn" type="button" class="btn btn-primary btn-block">
						<h3>Shift time | Shift Position</h3>
						<h3># Positions left</h3>
					</button>
					<button id="shiftBtn" type="button" class="btn btn-primary btn-block">
						<h3>Shift time | Shift Position</h3>
						<h3># Positions left</h3>
					</button>
				</div>
			</div>
		</div>
		</div>
		
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