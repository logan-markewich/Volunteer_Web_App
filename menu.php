<div class="menu" id="menu">
	<ul>
		<li><a href="dashboard.php">Home</a></li>
		<li><a href="createEvent.php">Create Event</a></li>
        <li><a href="#">Manage Events</a><b aria-haspopup="true" aria-controls="p1"></b>
        	<ul id="p1">
			
				<?php 
						$sql = ("SELECT * FROM cmpt370_rdynam.events WHERE eventCreator='" . $_SESSION["email"] . "'");
						$result = mysqli_query($conn, $sql);
						if ($result) {
							while($row = $result -> fetch_assoc()){
								?> <li><a href="eventOverview.php?id=<?php echo $row['idEvent'];?>"><?php echo ($row['eventName']." \n");?></a></li><?php
							}
						}
					?>
					
			</ul>
        </li>
		<li><a href="./scripts/config/logout.php">Logout</a></li>

	</ul>
</div>
