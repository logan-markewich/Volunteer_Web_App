<?php session_start(); 
require('./scripts/config/database.php');
$sql = ("SELECT * FROM cmpt370_rdynam.shift_descriptions WHERE eventName='" . $_SESSION['eventName'] . "'");
$result = mysqli_query($conn, $sql);
$sdescrip = "";

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
			<?php include('menu2.php'); ?>
		</div>
		
		<div class="row" id="Main">

			<div class="col-sm-6" id="shiftEditInfo">
				<div class="dropdown">
					<h3i>Select Shift Type to Edit: </h3i>
					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span id="selected"><?php 
						if (!empty($_GET)){
							$sql3 = ("SELECT shiftType FROM cmpt370_rdynam.shift_descriptions WHERE idShiftDescrip='" . $_GET['id'] . "'");
							$result3 = mysqli_query($conn, $sql3);
							while($row3 = $result3 -> fetch_assoc()){
								echo $row3['shiftType'];
							}
						} 
						else{
							echo "Select a Type";
						}?>
					
					</span><span class="caret"></span></button>
  					<ul class="dropdown-menu">
    					<?php while($row = $result -> fetch_assoc()){
						
								?><li><a href="shiftTypes.php?id=<?php echo $row['idShiftDescrip'];?>"><?php echo $row['shiftType']; ?></a></li><?php
											
						} ?>
  					</ul>
				</div> 
				<div>
					<h3>- OR -</h3>
				</div>
				<form class="form-horizontal" name="newTypes" action="/scripts/create/newShiftType.php" method="post">
					<!-- Event Creation Form -->
  					
					<div class="form-group">
    					<label class="control-label col-sm-3" for="name">Add New Shift Type:</label>
    					<div class="col-sm-7">
      						<input type="text" name="shiftType" class="form-control" id="shift_sign_up" placeholder="Shift Type">
    					</div>
  					</div>        
  				
  					<div class="form-group"> 
    					<div class="col-sm-offset-2 col-sm-10">
      						<button type="submit" class="btn btn-default">Add</button>
    					</div>
  					</div>
				</form>
				
				
			</div>
			
			<div class="col-sm-6" id="volInfo">
				<h1> Shift Type Description </h1>
				<?php $sql2 = ("SELECT shiftDescription FROM cmpt370_rdynam.shift_descriptions WHERE idShiftDescrip='" . $_GET['id'] . "'");
										$result2 = mysqli_query($conn, $sql2);

										while($row2 = $result2 -> fetch_assoc()){
											$sdescrip = $row2['shiftDescription'];
										} 
										 ?>
				<form class="form-horizontal" name="editDescrip" action="/scripts/edit/changeShiftDescrip.php" method="post">
					<!-- Event Creation Form -->
  					
					<div class="form-group">
    					<div class="col-sm-12">
      						<input type="text" name="description" class="form-control" id="shift_sign_up" value="<?php echo $sdescrip; ?>" >
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
		
		
		
<script>	
$('.dropdown li').click(function(){
    $('#selected').text($(this).text());
  });			
</script>
		</div>
		
		<?php include('ftr.php'); ?>
	</div>
</body>
</html>