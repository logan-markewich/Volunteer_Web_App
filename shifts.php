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
	
	<link rel="stylesheet" href="/css/shifts.css" />
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
		<?php $table_name = "cmpt370_rdynam.".$_SESSION['eventName'];
		$dates = array();
		$sql = ("SELECT count( DISTINCT(date_Time) ) FROM ". $table_name ."");
		$result = mysqli_query($conn, $sql);
		$sql2 = ("SELECT date_Time FROM ". $table_name ."");
		$result2 = mysqli_query($conn, $sql2);
		$count = 0;
		if ($result2) {
							while($row = $result2 -> fetch_assoc()){
								array_push($dates, $row['date_Time']);
								$count += 1;
							}
						}
		asort($dates);

		?>
		<!-- Php should make a row for every two events -->
		<div id="Main">
		
		<h1> <?php echo($_SESSION["eventName"]); ?> </h1> 
		<?php 
		for ($i = 0; $i < $count; $i+=2){
		?>
		
		<div class="row" id="shiftRow">
  			<div class="col-sm-6" id="shifts-left">
				<h2> <?php echo($dates[0+$i]); ?> </h2>
				<div id="shiftarea">
					<?php 
					$sql3 = ("SELECT * FROM ". $table_name ." WHERE date_Time='" . $dates[0+$i] . "'");
					$result3 = mysqli_query($conn, $sql3);
					if ($result3) {
							while($row2 = $result3 -> fetch_assoc()){ ?>
								<button id="shiftBtn" type="button" onclick="location.href='/shiftEdit.php?id=<?php echo $row2["idShift"];?>'" class="btn btn-primary btn-block">
								<h3><?php echo $row2['start_Time'] ?> | <?php echo $row2['shift_position'] ?></h3>
								<h3><?php echo $row2['number_of_volunteers_left'] ?> shifts left</h3>
								</button> <?php 
							}
						} ?>
				</div>
			</div>
			<?php 
				if($count > ($i + 1)) { 
			?>
			<div class="col-sm-6" id="shifts-right">
				<h2> <?php echo($dates[1+$i]); ?> </h2>
				<div id="shiftarea">
					<?php 
					$sql4 = ("SELECT * FROM ". $table_name ." WHERE date_Time='" . $dates[1+$i] . "'");
					$result4 = mysqli_query($conn, $sql4);
					if ($result4) {
							while($row3 = $result4 -> fetch_assoc()){ ?>
								<button id="shiftBtn" type="button" onclick="location.href='/shiftEdit.php?id=<?php echo $row3["idShift"];?>'" class="btn btn-primary btn-block">
								<h3><?php echo $row3["start_Time"] ?> | <?php echo $row3["shift_position"] ?></h3>
								<h3><?php echo $row3["number_of_volunteers_left"] ?> shifts left</h3>
								</button> <?php 
							}
						} ?>
				</div>
			</div>
			<?php 
				}
			?>
		</div>
		<?php } ?>
		</div>
		
		<?php include('ftr.php'); ?>
	</div>

</body>
</html>