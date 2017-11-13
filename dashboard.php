<?php session_start(); 
require('./scripts/config/database.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hollandia Volunt-EZ</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/menu.css">
	<link rel="stylesheet" href="/css/hdr_ftr.css">
	
	<link rel="stylesheet" href="/css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php	if($_SESSION["username"] == NULL){
			header("Location: index.php");
		}
		?>
<body>
	<!-- Page Header Information -->
	<div class="container-fluid" id="contain" >
		<?php include('hdr.php'); ?>
		
		<div id="mnu">
			<?php include('menu.php'); ?>
		</div>
		<div id="Main">
		<div class="row" id="dashOptions">
			<div class="col-sm-6">
				<h1 id="welcome"> Welcome, <?php echo($_SESSION["name"]); ?></h1>
			</div>
		</div>
		
		<div class="row" id="dashData">
			<h2 id="eventsTitle">Here's your events:</h2>
			<div class="col-sm-12">
				<!-- Display Owned Events -->
				<div>
					<?php 
						$sql = ("SELECT * FROM cmpt370_rdynam.events WHERE eventCreator='" . $_SESSION["email"] . "'");
						$result = mysqli_query($conn, $sql);
						if ($result) {
							while($row = $result -> fetch_assoc()){
								echo '<div id="eventBtns">';
								echo '<a href="eventOverview.php?id='; echo $row['idEvent']; echo '" id="eventBtn" type="button" class="btn btn-primary btn-block">';
								echo "<h3>";
								echo nl2br ($row['eventName']);
								echo "</h3>";
								echo "</a>";
								echo "</div>";
							}
						}
					?>
				</div>
			</div>
		</div>
		</div>
			
		<!-- Footer Information -->
		<?php include('ftr.php'); ?>
	</div>

</body>
</html>