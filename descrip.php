<?php 
session_start(); 
require('./scripts/config/database.php');
	$table_name = "cmpt370_rdynam.".$_SESSION['eventName'];
	$sql = ("SELECT * FROM ".$table_name." WHERE idShift='" . $_GET['id'] . "'");
	$result = mysqli_query($conn, $sql);
	while($row = $result -> fetch_assoc()){
		$shiftName = $row['shift_position'];
		$shiftStartTime = $row['start_Time'];
		$shiftEndTime = $row['end_Time'];
		$shiftsLeft = $row['number_of_volunteers_left'];
		$shiftLocation = $row['shift_location'];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hollandia Volunt-EZ</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="/css/main.css" />
	<link rel="stylesheet" href="/css/hdr_ftr.css" />
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
	
<body>
	<div class="container-fluid" id="contain">
		<?php include('hdr.php'); ?>
		
		<div class="row" id="Main">
			<div class="col-sm-6">
				<h1> <?php echo $shiftName; ?> </h1>
				<h3>Time: <?php echo date('g:iA',strtotime($shiftStartTime)) ?> - <?php echo date('g:iA',strtotime($shiftEndTime)) ?> | Location: <?php echo $shiftLocation;?></h3>
				<div class="availd"><?php echo $shiftsLeft;?> Shifts Available</div>
				<div style="width:600px; float:left;">
				<h2 align="left"> Description </h2>
				<div id="description">
				<?php 
						$sql2 = ("SELECT shiftDescription FROM shift_descriptions WHERE eventName='" . $_SESSION['eventName'] . "' AND shiftType='" . $shiftName . "'");
						$result2 = mysqli_query($conn, $sql2);
						while($row2 = $result2 -> fetch_assoc()){
							echo $row2['shiftDescription'];
						} ?>
				</div>
			</div>
			</div>
			<div class="col-sm-6" id="volInfo">
				<form class="form-horizontal">
  					<div class="form-group">
    					<label class="control-label col-sm-3" for="name">First Name:</label>
    					<div class="col-sm-9">
      						<input type="name" class="form-control" id="shift_sign_up" placeholder="First Name">
    					</div>
  					</div>
					<div class="form-group">
    					<label class="control-label col-sm-3" for="name">Last Name:</label>
    					<div class="col-sm-9">
      						<input type="name" class="form-control" id="shift_sign_up" placeholder="Last Name">
    					</div>
  					</div>
					<div class="form-group">
    					<label class="control-label col-sm-3" for="number">Phone Number:</label>
    					<div class="col-sm-9">
      						<input type="number" class="form-control" id="shift_sign_up" placeholder="(306) 555-5555">
    					</div>
  					</div>
					<div class="form-group">
    					<label class="control-label col-sm-3" for="email">Email:</label>
    					<div class="col-sm-9">
      						<input type="email" class="form-control" id="shift_sign_up" placeholder="placeholder@hollandiasoccer.com">
    					</div>
  					</div>
					<div class="form-group">
    					<label class="control-label col-sm-3" for="name">Team Name:</label>
    					<div class="col-sm-9">
      						<input type="name" class="form-control" id="shift_sign_up" placeholder="Hollandia Hoff">
    					</div>
  					</div>
					<div class="form-group">
    					<label class="control-label col-sm-3" for="number">Team Age Group:</label>
    					<div class="col-sm-9">
      						<input type="number" class="form-control" id="shift_sign_up" placeholder="U13 Girls">
    					</div>
  					</div>
  					<div class="form-group"> 
    					<div class="col-sm-offset-3 col-sm-9">
      						<button type="submit" class="btn btn-default">Submit</button>
    					</div>
  					</div>
				</form>
			</div>
		</div>
		
		<?php include('ftr.php'); ?>
	</div>
</body>
</html>