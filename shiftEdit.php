<?php session_start(); 
require('./scripts/config/database.php');
$table_name = "cmpt370_rdynam.".$_SESSION['eventName'];
$sql = ("SELECT * FROM ".$table_name." WHERE idShift='" . $_GET['id'] . "'");
$result = mysqli_query($conn, $sql);
while($row = $result -> fetch_assoc()){
	$name = $row['shift_position'];
	$loc = $row['shift_location'];
	$start = $row['start_Time'];
	$end = $row['end_Time'];
	$date = $row['date_Time'];
	$numVol = $row['number_of_volunteers'];
}
?>


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
	
<body>
	<div class="container-fluid" id="contain">
		<?php include('hdr.php'); ?>
		<div id="mnu">
				<?php include('menu2.php'); ?>
			</div>
		<div class="row" id="Main">

			<div class="col-sm-6" align="left">
				<div>
				<h3i> <?php echo $name; ?> </h3i> 
				<button id="editLocationBtn" type="submit" class="btn btn-default" onclick = "" > Edit </button>
				</div>
				<div>
				<h3i>Start Time: <?php echo $start; ?></h3i>
				<button id="editLocationBtn" type="submit" class="btn btn-default" onclick = "" > Edit </button>
				</div>
				<div>
				<h3i>End Time: <?php echo $end; ?></h3i>
				<button id="editLocationBtn" type="submit" class="btn btn-default" onclick = "" > Edit </button>
				</div>
				<div>
				<h3i>Location: <?php echo $loc; ?></h3i>
				<button id="editLocationBtn" type="submit" class="btn btn-default" onclick = "" > Edit </button>
				</div>
				<div>
				<h3i>Number of Volunteers Needed: <?php echo $numVol; ?></h3i>
				<button id="editLocationBtn" type="submit" class="btn btn-default" onclick = "" > Edit </button>
				</div>
				<div>
				<h3i>Shift Type: DROPDOWN BOX?</h3i>
				</div>
	
			</div>
			<div class="col-sm-6" id="volInfo">
				<h1> Shift Type Description Goes Here </h1>
			</div>
		</div>
		
		<?php include('ftr.php'); ?>
	</div>
</body>
</html>