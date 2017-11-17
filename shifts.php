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
		<?php include('hdr.php'); 
		$table_name = $_SESSION['eventName'];?>
		<!-- Php should make a row for every two events -->
		<div id="Main">
			<div id="mnu">
				<?php include('menu2.php'); ?>
			</div>
		<h1> <?php echo($_SESSION["eventName"]); ?> </h1> 
		<div class="row" id="shiftRow">
  			<div class="row" id="shifts-left">
				<h2> <?php echo "Start Date: " ?> <?php echo($_SESSION["startDate"]); ?> </h2>
				<!-- Display Shifts -->
				<div id="shiftarea">
				<?php
					$sql = ("Select * From `" . $table_name ."");
					$result = mysqli_query($conn, $sql);
					if($result){
						while($row = $result -> fetch_assoc()){
							echo '<div id="eventBtns">';
								echo '<a href="shiftOverview.php?id='; 
								echo $row['shift_position']; 
								echo '" id="eventBtn" type="button" class="btn btn-primary btn-block">';
								echo "<h3>";
								echo nl2br (strtoupper($row['start_Time'])." | ".strtoupper($row['shift_position']));
								echo "</h3>";
								echo "<h3>";
								echo nl2br ("Positions left: ". strtoupper($row["number_of_volunteers"]));
								echo "</h3>";
								echo "</a>";
								echo "</div>";
						}
					}
				?>
				</div>
			</div>
			<div class="row" id="shifts-right">
				<h2><?php echo "End Date: " ?> <?php echo($_SESSION["endDate"]); ?></h2>
				
			</div>
		</div>
		</div>
		
		<?php include('ftr.php'); ?>
	</div>

</body>
</html>