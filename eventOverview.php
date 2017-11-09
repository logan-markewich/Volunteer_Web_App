<?php session_start(); 
require('database.php');
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
			<?php include('menu2.php'); ?>
		</div>
		<div id="Main">
		<div class="row" id="dashOptions">
			<div class="col-sm-12">
				<h1 id="welcome"> <?php echo($_SESSION["eventName"]); ?>  </h1>
				<button id="editLocationBtn" type="submit" class="btn btn-default" onclick = "location.href='/deleteEvent.php'" > Delete Event </button>
			</div>
		</div>
		
		<div class="row" id="dashData" align="left" style="padding-left:10px">
			<div class="col-sm-7">
			<h2> Event Details </h2>
			<div id="edit">
			<h3i>Location: <?php echo $_SESSION['location']; ?></h3i>
			<button id="editLocationBtn" type="submit" class="btn btn-default" onclick = "location.href='/editEventLocation.php'" > Edit </button>
			</div>
			<div>
			<h3i>Dates: <?php echo date('F j, Y',strtotime($_SESSION['startDate']))." - ".date('F j, Y',strtotime($_SESSION['endDate'])); ?></h3i>
			<button id="exitBtn" type="submit" class="btn btn-default" onclick = "location.href='/editEventDates.php'"> Edit </button>
			</div>
			<div>
			<div>
			<h3i>Number of Shifts: <?php 
			if ($_SESSION['numShifts'] == NULL){
				echo "0";
			}
			else{
				echo $_SESSION['numShifts']; 
			}
			?></h3i>
			</div>

		</div>
		</div>
			<div class="col-sm-5">
			<h2>Shift Information</h2>
			<div>
			<button id="editShiftsTypeBtn" type="submit" class="btn btn-default"  > Manage Shift Types/Decriptions </button>
			</div>
			
			<div>
			<button id="addShiftsBtn" type="submit" class="btn btn-default"  > Add Shifts </button>
			</div>
			
			<div>
			<button id="editShiftsBtn" type="submit" class="btn btn-default" onclick = "location.href= '/shifts.php'" > Manage Existing Shifts </button>
			</div>
		</div>
			
		<!-- Footer Information -->
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