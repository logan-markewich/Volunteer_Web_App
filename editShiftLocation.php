<?php session_start(); ?>
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
	<!-- Page header: photo and social media -->
	<div class="container-fluid" id="contain">
		<?php include('hdr.php'); ?>
		<!-- Main Content -->
		<div class="row" id="Main">
			<div class="col-sm-12" id="volInfo">
				<form class="form-horizontal" name="editShift" action="/scripts/edit/changeShiftLocation.php" method="post">
					<!-- Event Creation Form -->
  					
					<div class="form-group">
    					<label class="control-label col-sm-2" for="name">Change Shift Location:</label>
    					<div class="col-sm-10">
      						<input type="text" name="location" class="form-control" id="shift_sign_up" placeholder=" Shift Location">
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
