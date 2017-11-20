<?php 
	session_start(); 
	require('./scripts/config/database.php');
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
		<?php include('hdr.php'); ?>
		
		<div id="mnu">
			<?php include('menu2.php'); ?>
		</div>
		
		<div id="Main">
			<div class="row" id="eventOptions">
				<div id="eventName">
					<h1 id="welcome"> <?php echo($_SESSION["eventName"]); ?>  </h1>
				</div>
			</div>
			<div class="row" id="eventData">
				<div>
					<h2>Event Details:</h2>
				</div>
				<div id="edit">
					<h3i>Location: <?php echo $_SESSION['location']; ?></h3i>
					<button id="editLocationBtn" type="submit" class="btn btn-default" onclick = "location.href='/editEventLocation.php'" > Edit </button>
				</div>
				<div>
					<h3i>Dates: <?php echo date('F j, Y',strtotime($_SESSION['startDate']))." - ".date('F j, Y',strtotime($_SESSION['endDate'])); ?></h3i>
					<button id="exitBtn" type="submit" class="btn btn-default" onclick = "location.href='/editEventDates.php'"> Edit </button>
				</div>
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
		
			
		<!-- Footer Information -->
		<?php include('ftr.php'); ?>
	</div>
	

</body>
</html>