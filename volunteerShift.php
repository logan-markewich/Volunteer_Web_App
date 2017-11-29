<?php session_start(); 
require('./scripts/config/database.php');
$table_name = str_replace(' ', '', "cmpt370_rdynam.".$_SESSION['eventName']);
$sql = ("SELECT * FROM ".$table_name." WHERE idShift='" . $_GET['id'] . "'");
$result = mysqli_query($conn, $sql);
while($row = $result -> fetch_assoc()){

	$_SESSION['shift_id'] = $row['idShift'];
	
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
	<link rel="stylesheet" href="/css/modal.css" />
	<link rel="stylesheet" href="/css/hdr_ftr.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="/modal.js"></script>
</head>
	
<body>
	<div class="container-fluid" id="contain">
		<?php include('hdr.php'); ?>
		
		<div id="mnu">
			<?php include('menu3.php'); ?>
		</div>
		
		<div class="row" id="Main">
			<div class="col-sm-6" id="shiftInfo">
				<div>
					<h3i>Title: <?php echo $name ?></h3i>
				</div>
				<div>
					<h3i>Start Time: <?php echo $start; ?></h3i>
				</div>
				<div>
					<h3i>End Time: <?php echo $end; ?></h3i>
				</div>
				<div>
					<h3i>Location: <?php echo $loc; ?></h3i>
				</div>
				<div>
					<h3i>Number of Volunteers Needed: <?php echo $numVol; ?></h3i>
				</div>
			</div>
			
			<div class="col-sm-6" id="volInfo">
				<h1> Shift Description </h1>
				<?php 
					$sql3 = ("SELECT shiftDescription FROM cmpt370_rdynam.shift_descriptions WHERE shiftType='" . $name . "'");
					$result3 = mysqli_query($conn, $sql3);

					while($row3 = $result3 -> fetch_assoc()){
						echo $row3['shiftDescription'];
					} 
				?>
			</div>
			<div class="col-sm-12" id="signUpArea">
				<h2>Enter contact information to register:</h2>
				<form class="form-horizontal" name="volunteerForm" action="/scripts/create/newVolunteer.php" method="post">
					<div class="form-group">
						<label for="FirstName">First Name:</label>
						<input type="name" name="firstName" class="form-control" id="firstName">
					</div>
					<div class="form-group">
    					<label for="lastName">Last Name:</label>
    					<input type="name" name="lastName" class="form-control" id="lastName">
  					</div>
					<div class="form-group">
    					<label for="email">Email address:</label>
    					<input type="email" name="email" class="form-control" id="email">
  					</div>
					<div class="form-group">
    					<label for="pwd">Phone Number:</label>
    					<input type="number" name="phoneNumber" class="form-control" id="phoneNumber">
  					</div>
					<div class="form-group">
						<input type="hidden" name="shiftId" value="<?php echo $_SESSION['shift_id']; ?>">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
		
		<?php include('ftr.php'); ?>
	</div>
</body>
</html>