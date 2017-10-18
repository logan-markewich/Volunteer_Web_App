<?php session_start(); 
require('database.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hollandia Volunt-EZ</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/menu.css">
	<link rel="stylesheet" href="/css/hdr_ftr.css">
	
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
		
		<div id="mnu">
			<?php include('menu.php'); ?>
		</div>
		<div id="Main">
		<div class="row" id="dashOptions">
			<div class="col-sm-6">
				<h1 id="welcome"> Welcome, <?php echo($_SESSION["name"]); ?></h1>
			</div>
		</div>
		
		<div class="row" id="dashData">
			<h2 id="eventsTitle">My Events</h2>
			<div class="col-sm-12">
				<!-- Display Owned Events -->
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