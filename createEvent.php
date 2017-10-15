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
		<!-- Main Content -->
		<div class="row" id="Main">
			<div class="col-sm-12" id="volInfo">
				<form class="form-horizontal" name="createEvent" action="/newEvent.php" method="post">
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
