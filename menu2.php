<div class="menu" id="menu">
	<ul>
		<li><a href="dashboard.php">Home</a></li>
		<li><a href="eventOverview.php?id=<?php echo $_SESSION['id'];?>"><?php echo $_SESSION['eventName'];?></a></li>
        <li><a href="#">Manage Shifts</a><b aria-haspopup="true" aria-controls="p1"></b>
        	<ul id="p1">
				<li><a href="#"> Shift Types/Descriptions</a></li>
				<li><a href="#"> Add Shifts</a></li>
				<li><a href="#"> Manage Existing Shifts</a></li>
				</ul>
        </li>
		<li><a href="#">Manage Volunteers</a></li>
		<li><a href="/scripts/edit/deleteEvent.php">Delete Event</a></li>
		<li><a href="./scripts/config/logout.php">Logout</a></li>

	</ul>
</div>
