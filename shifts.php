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
		<?php include('hdr.php'); ?>
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
		
		<?php include('ftr.php'); ?>
	</div>

</body>
</html>