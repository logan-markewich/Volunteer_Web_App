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
	
	<div class="container-fluid" id="contain" >
		<?php include('hdr.php'); ?>
		
		<div id="mnu">
			<?php include('menu.php'); ?>
		</div>
		<div id="Main">
		
		<div class="row" id="dashData">
			<h2 id="eventsTitle">You Have Entered the Access Code For This Event, Click to Proceed:</h2>
			<div class="col-sm-12">
				<!-- Display Owned Events -->
				<div>
					<?php 
						$sql = ("SELECT * FROM cmpt370_rdynam.events WHERE eventCreator='" . $_POST["accessCode"] . "'");
						$result = mysqli_query($conn, $sql);
						if ($result) {
							while($row = $result -> fetch_assoc()){
								echo '<div id="eventBtns">';
								echo '<a href="eventOverview.php?id='; echo $row['idEvent']; echo '" id="eventBtn" type="button" class="btn btn-primary btn-block">';
								echo "<h3>";
								echo nl2br (strtoupper($row['eventName'])." | ".date('M j, Y',strtotime($row['startDate']))." - ".date('M j, Y',strtotime($row['endDate'])));
								echo "</h3>";
								echo "</a>";
								echo "</div>";
							}
						}
						else{
							alert("This code does not exist, redirecting to homepage.");
							header("Location: ../../index.php");
						}
					?>
				</div>
			</div>
		</div>
		</div>
			
		<!-- Footer Information -->
		<?php include('ftr.php'); ?>
	</div>