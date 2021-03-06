<?php 
	session_start(); 
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
		<!-- Page header: photo and social media -->
		<?php include('hdr.php'); ?>
		
		<!-- Main Content -->
		<div class="row" id="Main">
			<div class="col-sm-12" id="volInfo">
				<form class="form-horizontal" name="editShiftTime" action="/scripts/edit/changeShiftTime.php" method="post">
					<!-- Edit shift time Form -->
					<div class="form-group">
    						<label class="control-label col-sm-2" for="date">Change Start Time:</label>
    						<div class="col-sm-10">
      							<input type="time" name="startTime" class="form-control" id="shift_sign_up" placeholder="  00:00  ">
    						</div>
  					</div>        
					<div class="form-group">
    						<label class="control-label col-sm-2" for="date">Change End Time:</label>
    						<div class="col-sm-10">
      							<input type="time" name="endTime" class="form-control" id="shift_sign_up" placeholder="  00:00  ">
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
