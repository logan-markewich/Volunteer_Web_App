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
				<h1> Position Name </h1>
				<h3>Time: 9:30am - 12:30pm | Location: Blairmore</h3>
				<div class="availd">2 Shifts Available</div>
				<div style="width:600px; float:left;">
				<h2 align="left"> Description </h2>
				<div id="description">
				This is where the description goes. It can be as wordy or brief as needed. It would be good to have a 'shift type' field of some sort that the shifts can be linked to, then the organizer only has to upload one description per type and it will populate for each shift of that type.
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
      						<input type="number" class="form-control" id="shift_sign_up" placeholder="Phone Number">
    					</div>
  					</div>
					<div class="form-group">
    					<label class="control-label col-sm-3" for="email">Email:</label>
    					<div class="col-sm-9">
      						<input type="email" class="form-control" id="shift_sign_up" placeholder="Email Address">
    					</div>
  					</div>
					<div class="form-group">
    					<label class="control-label col-sm-3" for="name">Team Name:</label>
    					<div class="col-sm-9">
      						<input type="name" class="form-control" id="shift_sign_up" placeholder="Team Name">
    					</div>
  					</div>
					<div class="form-group">
    					<label class="control-label col-sm-3" for="number">Team Age Group:</label>
    					<div class="col-sm-9">
      						<input type="number" class="form-control" id="shift_sign_up" placeholder="Team Age Group">
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