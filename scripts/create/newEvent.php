// This script creates the event in the events table, as well as that tables respective shifts table, using 
// the data the user entered in the html form

<?php
require('../config/database.php');
session_start();

$eventNameNoSpaces = str_replace(' ', '', $_POST["eventName"]);

$sql = "INSERT INTO events (eventName, eventCreator, startDate, endDate, location, numShifts, accessCode)
VALUES ('" . $_POST["eventName"] . "','" . $_SESSION['email'] . "', '" . $_POST["startDate"] . "', '" . $_POST["endDate"] . "', '" . $_POST["location"] . "', '" . $_POST["0"] . "', '" . $_POST["accessCode"] . "')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../../dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);



require('../config/database.php');
session_start();

$eventNameNoSpaces = str_replace(' ', '', $_POST["eventName"]);

$sql = "CALL create_shifts_at_event_table('$eventNameNoSpaces')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../../dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


?> 
