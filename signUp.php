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
	<!-- Validate form data -->
	<script>
function validateForm() {
	var u = document.forms["signup"]["email"].value;
	var v = document.forms["signup"]["password"].value;
	var w = document.forms["signup"]["confpw"].value;
    var x = document.forms["signup"]["firstName"].value;
	var y = document.forms["signup"]["lastName"].value;
	var z = document.forms["signup"]["username"].value;
    if (u == "") {
        alert("Email must be filled out");
        return false;
    }
	if (v == "") {
        alert("Password must be filled out");
        return false;
    } 
	if (w == "") {
        alert("Please confirm your password");
        return false;
    }    
	if (x == "") {
        alert("First name must be filled out");
        return false;
    }
	if (y == "") {
        alert("Last name must be filled out");
        return false;
    }
	if (z == "") {
        alert("Username must be filled out");
        return false;
    } 
	if (v != w) {
        alert("Password fields must match");
        return false;
    } 
}
</script>
</head>
	<!-- Page Header Information -->
<body>
	<div class="container-fluid" id="contain">
		<?php include('hdr.php'); ?>
		
		<div class="row" id="Main">
  			<div class="col-sm-4" id="img-Left">
				<img class="img-responsive" src="img/austin.jpg" id="left">
			</div>
  			<div class="col-sm-4">
				<h1>Sign Up Today!</h1>
				<form name ="signup" method ="post" action = "/scripts/create/newPerson.php" onsubmit="return validateForm()" >
					<div class="form-group">
    					<label for="pwd">First Name:</label>
    					<input type="name" name="firstName" class="form-control" id="firstName">
  					</div>
					<div class="form-group">
    					<label for="pwd">Last Name:</label>
    					<input type="name" name="lastName"class="form-control" id="lastName">
  					</div>
					<div class="form-group">
    					<label for="email">Email address:</label>
    					<input type="email" name="email" class="form-control" id="email">
  					</div>
					<div class="form-group">
    					<label for="usrname">Username:</label>
    					<input type="username" name="username" class="form-control" id="usrname">
  					</div>
					<div class="form-group">
    					<label for="pwd">Password:</label>
    					<input type="password" name="password" class="form-control" id="pwd">
  					</div>
					<div class="form-group">
    					<label for="pwd">Confirm Password:</label>
    					<input type="password" name="confpw" class="form-control" id="pwd">
  					</div>
  					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
			<div class="col-sm-4" id="img-Right">
				<img class="img-responsive" src="img/percy.jpg" id="right">
			</div>
		</div>
		<!-- Footer Information -->
		<?php include('ftr.php'); ?>
	</div>

</body>
</html>
