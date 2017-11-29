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
	
<body>
	
	<div class="container-fluid" id="contain">
		<?php include('hdr.php'); ?>
		
		<div id="mnu">
				<?php include('menu2.php'); ?>
		</div>
		
		<div id="Main">
			<h1><?php echo($_SESSION["eventName"]);?> Volunteers</h1>           
  				<table class="table" id="volTable">
    				<thead>
      					<tr>
        					<th>Name</th>
        					<th>Position</th>
							<th>Location</th>
							<th>Start Time</th>
							<th>End Time</th>
      					</tr>
    				</thead>
    				<tbody>
			<?php
				$table_name = str_replace(' ', '', $_SESSION["eventName"]);
				$sql1 = ("select * from volunteers");
				$result = mysqli_query($conn, $sql1);
				if($result) {
					while($row = $result -> fetch_assoc()){
			?>
						<tr>
							<td><?php echo $row['firstName']; ?>  <?php echo $row['lastName']; ?></td>
			<?php
						$sql2 = ("select * from ". $table_name ." where idShift ='". $row['idShift'] ."'");
						$result2 = mysqli_query($conn, $sql2);
						while($row2 = $result2 -> fetch_assoc()) {
			?>
							<td><?php echo $row2['shift_position']; ?></td>
							<td><?php echo $row2['shift_location']; ?></td>
							<td><?php echo $row2['start_Time']; ?></td>
							<td><?php echo $row2['end_Time']; ?></td>
						</tr>
			<?php
						}
					}	
				}
			?>
					</tbody>
			</table>
		</div>
		<?php include('ftr.php'); ?>
	</div>
</body>
</html>