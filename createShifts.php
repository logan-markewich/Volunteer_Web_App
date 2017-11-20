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
	
	<link rel="stylesheet" href="/css/main.css" />
	<link rel="stylesheet" href="/css/menu.css" />
	<link rel="stylesheet" href="/css/hdr_ftr.css" />
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
	
<body>
	<!-- Page header: photo and social media -->
	<div class="container-fluid" id="contain">
		<?php include('hdr.php'); ?>
		<div id="mnu">
			<?php include('menu2.php'); ?>
		</div>
		<!-- Main Content -->
		<div class="row" id="Main">
			<div class="col-sm-12" id="volInfo">
			<h1> <?php echo($_SESSION["eventName"]); ?> <?php echo '-- Shift Information' ?> </h1> 
				<form class="form-horizontal" name="createShift" action="/scripts/create/newShift.php" method="post">
					<!-- Event Creation Form -->
  					<div class="form-group">
    					<label class="control-label col-sm-2" for="name">Shift Location:</label>
    					<div class="col-sm-10">
      						<input type="text" name="location" class="form-control" id="shift_sign_up" placeholder="Shift Location">
    					</div>
  					</div>
  					<div class="form-group">
    					<label class="control-label col-sm-2" for="name">Shift Position:</label>
    					<div class="col-sm-10">
      						<div class="dropdown">
							<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span id="selected">Select Type
						
					</span><span class="caret"></span></button>
  					<ul class="dropdown-menu">
    					<?php 
						$sql3 = ("SELECT shiftType FROM cmpt370_rdynam.shift_descriptions WHERE eventName='" . $_SESSION['eventName'] . "'");
							$result3 = mysqli_query($conn, $sql3);
						while($row3 = $result3 -> fetch_assoc()){
						
								?><li><a href="#"><?php echo $row3['shiftType']; ?></a></li><?php
											
						} ?>
  					</ul>
				</div> 
    					</div>
  					</div>
					<div class="form-group">
    					<label class="control-label col-sm-2" for="name">Shift Date:</label>
    					<div class="col-sm-10">
      						<input type="date" name="date" class="form-control" id="shift_sign_up" placeholder="17/11/30 for November 30, 2017">
    					</div>
  					</div>
					<div class="form-group">
    					<label class="control-label col-sm-2" for="date">Start Time:</label>
    					<div class="col-sm-10">
      						<input type="time" name="startTime" class="form-control" id="shift_sign_up" placeholder=" 00:00 ">
    					</div>
  					</div>        
  					
					<div class="form-group">
    					<label class="control-label col-sm-2" for="date">End Time:</label>
    					<div class="col-sm-10">
      						<input type="time" name="endTime" class="form-control" id="shift_sign_up" placeholder=" 00:00 ">
    					</div>
  					</div>
  					
  					<div class="form-group">
    					<label class="control-label col-sm-2" for="date">Number Of Volunteers:</label>
    					<div class="col-sm-10">
      						<input type="integer" name="number_of_vol" class="form-control" id="shift_sign_up" placeholder="Number Of Volunteers">
    					</div>
  					</div>
  					<div class="form-group"> 
    					<div class="col-sm-offset-2 col-sm-10">
      						<button type="submit" class="btn btn-default" action="/scripts/create/newShift.php" method="post"    >Submit</button>
    					</div>
  					</div>
				</form>

			</div>
		</div>
		<!-- Footer Information -->
		<?php include('ftr.php'); ?>
	</div>
</body>
</html>
