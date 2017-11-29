<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="menu" id="menu">
	<ul>
		<li><a href="dashboard.php">Home</a></li>
		<li><a href="eventOverview.php?id=<?php echo $_SESSION['id'];?>"><?php echo $_SESSION['eventName'];?></a></li>
        <li><a href="#">Manage Shifts</a><b aria-haspopup="true" aria-controls="p1"></b>
        	<ul id="p1">
				<li><a href="shiftTypes.php"> Shift Types/Descriptions</a></li>
				<li><a href="createShifts.php"> Add Shifts</a></li>
				<li><a href="shifts.php?id=<?php echo $_SESSION['id'];?>"> Manage Existing Shifts</a></li>
				</ul>
        </li>
		<li><a href="manageVolunteers.php">Manage Volunteers</a></li>
		<li><a href="/scripts/edit/deleteShift.php" onclick="return confirm('Are you sure you want to delete this ShiftType? ');">Delete ShiftType</a></li>
		<li><a href="/scripts/config/logout.php">Logout</a></li>

	</ul>
</div>
