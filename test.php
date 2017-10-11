<!-- 
<?php

// $host="db.cs.usask.ca:3306"; // Host name
// $username="cmpt370_rdynam"; // Mysql username
// $password="j9mnyOSf1Ewbl8qLngHt"; // Mysql password
// $db_name="cmpt370_rdynam"; // Database name
// 
// $conn = new mysqli($host, $username, $password, $db_name);
// 
// echo "connect?";
// 
// // $sql = "UPDATE members SET email='jin.2099@usask.ca' WHERE username='jin'";
// 
// $sql = "INSERT INTO members (id, firstname,lastname, username, password,email,verified,mod_timestamp)
// VALUES ('5', 'John', 'Doe', 'j','1234', 'jin2066@gmail.com', 'y', '2017-10-09 21:49:43')";
// 

?>
 -->

<?php
$servername="db.cs.usask.ca";
$username="cmpt370_rdynam";
$password="j9mnyOSf1Ewbl8qLngHt";
$db_name="cmpt370_rdynam";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully</br>";

$result = mysqli_query($conn, "SELECT email from members");
$count=mysqli_num_rows($result);
echo "count = $count";

// echo $result;

// $row = mysql_fetch_array($result);

// while ($row = $result->fetch_assoc()) {
//     echo $row['classtype']."<br>";
// }

?>



