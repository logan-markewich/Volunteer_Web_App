// This script removes a users session variables, therefor kicking them out of the pages that require them

<?php
require('database.php');
mysqli_close($conn);
session_unset(); // clear the $_SESSION variable

if(isset($_COOKIE[session_name()])) {
    setcookie(session_name(),'',time()-3600); # Unset the session id
}

session_destroy(); // finally destroy the session
header("Location: ../../index.php");

?>
