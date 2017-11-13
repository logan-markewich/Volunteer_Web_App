<!doctype html>
<html>
<head>
	<title>Hollandia Volunt-EZ</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="/css/main.css" />
	<link rel="stylesheet" href="/css/hdr_ftr.css" />
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- Validate form data -->
	<script>
	function validateForm() {
		var x = document.forms["login"]["email"].value;
		var y = document.forms["login"]["pwd"].value;
		if (x == "") {
			alert("Name must be filled out");
			return false;
		}
		if (y == "") {
			alert("Password must be filled out");
			return false;
		}
	}
</script>

</head>
	
<body>
	<!-- Page header: photo and social media -->
	<div class="container-fluid" id="contain">
		<div id="hdr">
			<div id="social">
				<a href="https://www.facebook.com/hollandiasoccer" target="_blank">			
					<img src="img/fb.png" />
				</a>
				<a href="https://www.instagram.com/hollandiasoccer/" target="_blank">		
					<img src="img/ig.png" >
				</a>
				<a href="https://www.youtube.com/channel/UCeyZXkqKTUyNs0S_tCL9QFw" target="_blank">
					<img src="img/yt.png" >
				</a>
				<a href="https://twitter.com/HollandiaSoccer" target="_blank">
					<img src="img/tw.png" >
				</a>
			</div>
		</div>
		
		<div class="row" id="Main">
  			<div class="col-sm-4" id="img-Left">
				<img class="img-responsive" src="img/austin.jpg" id="left">
			</div>
  			<div class="col-sm-4">
				<form>
					<!-- Volunteer Login Form -->
					<h2>Volunteers</h2>
  					<div class="form-group">
    					<label for="accessCode">Access Code:</label>
    					<input type="name" class="form-control" id="accessCode">
  					</div>
  					<button id="accessCodeBtn" type="submit" class="btn btn-default">Submit</button>
					</form>
					<!-- Event Manager Login Form -->
					<form name="login" action="/scripts/config/login.php" onsubmit="return validateForm()" method="post">
					<h2 id="signInStart">Event Managers</h2>
					<div class="form-group">
    					<label for="email">Email address:</label>
    					<input type="email" class="form-control" id="email" name="email">
  					</div>
  					<div class="form-group">
    					<label for="pwd">Password:</label>
    					<input type="password" class="form-control" id="pwd" name="pwd">
  					</div>
  					<div class="checkbox">
    					<label><input type="checkbox"> Remember me</label>
  					</div>
  					<button id="signInBtn" type="submit" class="btn btn-default">Sign In</button>
					</form>
					<!-- Account Creation Button -->
					<form>
					<h3>Don't have an account?</h3>
					<a id="signUpBtn" type="submit" class="btn btn-default" href="/signUp.php">Sign up now!</a>
				</form>
			</div>
			<div class="col-sm-4" id="img-Right">
				<img class="img-responsive" src="img/percy.jpg" id="right">
			</div>
		</div>
		<!-- Footer Information -->
		<div class="col-sm-12" id="ftr">
        	<center>
        		<div id="mob-social">
					<a href="https://www.facebook.com/hollandiasoccer" target="_blank"><img src="img/fb.png" /></a><a href="https://twitter.com/HollandiaSoccer" target="_blank"><img src="img/tw.png" ></a><a href="https://www.instagram.com/hollandiasoccer/" target="_blank"><img src="img/ig.png" ></a><a href="https://www.youtube.com/channel/UCeyZXkqKTUyNs0S_tCL9QFw" target="_blank"><img src="img/yt.png" ></a>
				</div>
				<p>
					<strong>Purpose</strong>: <em>Enhancing our community by inspiring people to enrich their lives through soccer</em><br />
					<strong>Mission</strong>: <em>To inspire players, parents, and coaches to be passionate about soccer and to reach their full potential through player-centric programs</em><br />
            		<strong>Vision</strong>: <em>Hollandia will be the club of choice, building community and a membership which commits to behavior consistent with our values</em>
				</p>
        	<p><span>Copyright Hollandia Soccer Club; <? echo date("Y"); ?>  	All Rights Reserved.</span></p>
        </center>

	</div>
	</div>

</body>
</html>