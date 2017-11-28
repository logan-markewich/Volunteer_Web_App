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
		<!-- Php should make a row for every two events -->
		<div id="Main">
		
		<h1> <?php echo($_SESSION["eventName"]); ?> </h1>
		<?php
			$table_name = str_replace(' ', '', $_SESSION["eventName"]);
			$sql = ("select * from ". $table_name ." order by date_time asc");
			$result = mysqli_query($conn, $sql);
			$prevRowDate = NULL;
			$dates = array();
			$count = 0;
			$dateCount = 0;
			$dates[$count] = array();
			if ($result) {
				while($row = $result -> fetch_assoc()){
					//Actually code make a shift area right here
					if($prevRowDate != NULL) {
						if($prevRowDate == $row['date_Time']){
							array_push($dates[$count], $row);
						}
						else {
							$count++;
							$dates[$count] = array();
							array_push($dates[$count], $row);
						}
					}
					
					$prevRowDate = $row["date_Time"];
				}
			}
					
			foreach($dates as $value) {
		?>
		<div class="row" id="shiftRow">
  			<div class="col-sm-12" id="shifts-left">
			<?php 
				$first = 1;
				foreach($value as $rowValue) {
					if($first == 1) {
			?>
				<h2> <?php echo(date('F j',strtotime($rowValue['date_Time']))); ?> </h2>
				<div id="shiftarea">
			<?php
					$first = 0;
					}
			?>
							<button id="shiftBtn" type="button" onclick="location.href='/shiftEdit.php?id=<?php echo $rowValue["idShift"];?>&type=<?php echo $rowValue['shift_position'];?>'" class="btn btn-primary btn-block">
							<h3><?php echo date('g:i A',strtotime($rowValue["start_Time"])) ?> | <?php echo $rowValue['shift_position'] ?></h3>
							<h3><?php echo $rowValue['number_of_volunteers_left'] ?> shifts left</h3>
							</button> 
			<?php 
				}
			?>
				</div>
			</div>
		</div>
		<?php
				$count++;
			}
		?>
		</div>
		
		<?php include('ftr.php'); ?>
	</div>

</body>
</html>