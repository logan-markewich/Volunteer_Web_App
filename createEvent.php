<?php 
	session_start(); 
	require('./scripts/config/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hollandia Volunt-EZ</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="/css/main.css" />
	<link rel="stylesheet" href="/css/menu.css">
	<link rel="stylesheet" href="/css/hdr_ftr.css" />
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<?php	if($_SESSION["username"] == NULL){
			header("Location: index.php");
		}
		?>
	
<body>
	<!-- Page header: photo and social media -->
	<div class="container-fluid" id="contain">
		<?php include('hdr.php'); ?>
		
		<div id="mnu">
			<?php include('menu.php'); ?>
		</div>
		<!-- Main Content -->
		<div class="row" id="Main">
			<div class="col-sm-12" id="volInfo">
				<form class="form-horizontal" name="createEvent" action="/scripts/create/newEvent.php" method="post">
					<!-- Event Creation Form -->
  					<div class="form-group">
    					<label class="control-label col-sm-2" for="name">Event Name:</label>
    					<div class="col-sm-10">
      						<input type="text" name="eventName" class="form-control" id="shift_sign_up" placeholder="Event Name">
    					</div>
  					</div>
					<div class="form-group">
    					<label class="control-label col-sm-2" for="name">Event Location:</label>
    					<div class="col-sm-10">
      						<input type="text" name="location" class="form-control" id="shift_sign_up" placeholder="Location">
    					</div>
  					</div>
					<div class="form-group">
    					<label class="control-label col-sm-2" for="date">Start Date:</label>
    					<div class="col-sm-10">
      						<input type="date" name="startDate" class="form-control" id="shift_sign_up" placeholder="17/11/30 for November 30, 2017">
    					</div>
  					</div>        
  					
					<div class="form-group">
    					<label class="control-label col-sm-2" for="date">End Date:</label>
    					<div class="col-sm-10">
      						<input type="date" name="endDate" class="form-control" id="shift_sign_up" placeholder="17/12/03 for December 3, 2017">
    					</div>
  					</div>
  					<div class="form-group"> 
    					<div class="col-sm-offset-2 col-sm-10">
      						<button type="submit" class="btn btn-default">Submit</button>
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
