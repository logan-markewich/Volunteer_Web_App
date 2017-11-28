<?php session_start(); 
require('./scripts/config/database.php');
$table_name = str_replace(' ', '', "cmpt370_rdynam.".$_SESSION['eventName']);
$sql = ("SELECT * FROM ".$table_name." WHERE idShift='" . $_GET['id'] . "'");
$result = mysqli_query($conn, $sql);
while($row = $result -> fetch_assoc()){

	$_SESSION['shift_id'] = $row['idShift'];
	
	$name = $row['shift_position'];
	$loc = $row['shift_location'];
	$start = $row['start_Time'];
	$end = $row['end_Time'];
	$date = $row['date_Time'];
	$numVol = $row['number_of_volunteers'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hollandia Volunt-EZ</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="/css/main.css" />
	<link rel="stylesheet" href="/css/menu.css" />
	<link rel="stylesheet" href="/css/modal.css" />
	<link rel="stylesheet" href="/css/hdr_ftr.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="/modal.js"></script>
</head>
	
<body>
	<div class="container-fluid" id="contain">
		<?php include('hdr.php'); ?>
		
		<div id="mnu">
			<?php include('menu3.php'); ?>
		</div>
		
		<div class="row" id="Main">

			<div class="col-sm-6" id="shiftEditInfo">
				<form class="form-horizontal" name="positionForm" action="/scripts/edit/changeShiftName.php" method="post">
					<div class="form-group" name="positionForm">
						<h3i>Title: </h3i>
						<div>
							<input type="hidden" name="position" id="position">
							<div class="dropdown">
								<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span id="selected"><?php echo $name ?></span><span class="caret"></span></button>
  								<ul class="dropdown-menu">
    							<?php 
									$sql2 = ("SELECT * FROM cmpt370_rdynam.shift_descriptions WHERE eventName='" . $_SESSION['eventName'] . "'");
									$result2 = mysqli_query($conn, $sql2);
						
									while($row2 = $result2 -> fetch_assoc()){

									?><li><a href="#"><?php echo $row2['shiftType']; ?></a></li><?php
	
									} ?>
  								</ul>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div>
							<button type="submit" class="btn btn-default" action="/scripts/edit/changeShiftName.php" method="post">Change</button>
						</div>
					</div>
				</form>
				<div>
					<h3i>Start Time: <?php echo $start; ?></h3i>
					<button id="editStartBtn" type="submit" class="btn btn-default" onclick = "location.href='/editShiftTime.php'"> Edit </button>
				</div>
				<div>
					<h3i>End Time: <?php echo $end; ?></h3i>
					<button id="editEndBtn" type="submit" class="btn btn-default" onclick = "location.href='/editShiftTime.php'" > Edit </button>
				</div>
				<div>
					<h3i>Location: <?php echo $loc; ?></h3i>
					<button id="editLocBtn" type="submit" class="btn btn-default" onclick = "location.href='/editShiftLocation.php'" > Edit </button>
				</div>
				<div>
					<h3i>Number of Volunteers Needed: <?php echo $numVol; ?></h3i>
					<button id="editVolBtn" type="submit" class="btn btn-default" onclick = "location.href='/editNumOfPositions.php'" > Edit </button>
				</div> 
			</div>
			
			<div class="col-sm-6" id="volInfo">
				<h1> Shift Description </h1>
				<?php $sql3 = ("SELECT shiftDescription FROM cmpt370_rdynam.shift_descriptions WHERE shiftType='" . $name . "'");
										$result3 = mysqli_query($conn, $sql3);

										while($row3 = $result3 -> fetch_assoc()){
											echo $row3['shiftDescription'];
										} 
										 ?>
			</div>
		</div>
		
		<!-- The Modal -->
		<div id="editNameModal" class="modal">

			<!-- Modal content -->
			<div class="modal-content">
				<span class="close">&times;</span>
				<input type="text" name="changeName" class="form-control" id="nameChange" placeholder="Shift Name">
				<button id="editVolBtn" type="submit" class="btn btn-default" onclick="/scripts/edit/changeShiftName.php"> Submit </button>
			</div>
		
<script>// Get the modal
var modal = document.getElementById('editNameModal');

// Get the button that opens the modal
var btn = document.getElementById("editNameBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
} </script>

<script>	
$('.dropdown li').click(function(){
    $('#selected').text($(this).text());
	$('#position').val($(this).text());
    $('#positionForm').submit();
  });			
</script>
		</div>
		
		<?php include('ftr.php'); ?>
	</div>
</body>
</html>