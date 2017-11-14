
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
				<h1 id="welcome"> Hell_world; ?></h1>
			</div>
		</div>
		
	
			
		<!-- Footer Information -->
		<?php include('ftr.php'); ?>
	</div>

</body>
</html>
