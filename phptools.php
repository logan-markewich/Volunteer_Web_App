<?php
//to differentiate from the PHP build-in Array_ functions, my customized functions are with a prefix of ArrayX_

//include ($_SERVER['DOCUMENT_ROOT'].'/epi/php/phpcode_test.php'); //include a temporary test.php, so as to test the function before putting into the tools

//connect to the mySQL database;
function connectMySQL(){
	$host="db.cs.usask.ca"; // Host name 
	$hostusername="cmpt370_rdynam"; // Mysql username 
	$hostpassword="j9mnyOSf1Ewbl8qLngHt"; // Mysql password 
	$db_name="cmpt370_rdynam"; // Database name 
	
	// $servername="db.cs.usask.ca";
// 	$username="cmpt370_rdynam";
// 	$password="j9mnyOSf1Ewbl8qLngHt";
// 	$db_name="cmpt370_rdynam";

	//$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully</br>";

// $result = mysqli_query($conn, "SELECT email from members");
// $count=mysqli_num_rows($result);
// echo "count = $count";

// 	Connect to server and select databse.
	$link=mysqli_connect("$host", "$hostusername", "$hostpassword")or die("cannot connect"); 
	mysqli_select_db($link, "$db_name")or die("cannot select DB");
	return $link;
}

function br(){
	echo "<br/>";	
}

//fetch a table/view from MySQL, and save into an Array
function fetchMySQLData($theMySQLlink, $theStatement, $theLinkResult){
	
	//if $theLinkResult is not null, the MySQL result is obtained, no need to reconnect
	if (empty($theLinkResult) == false ){
		
		while($eachrow = mysqli_fetch_assoc($theLinkResult)){
		$targetArray[] = $eachrow;//for each row, save the values in a row into the array $wordsToTest, which eventually has all rows and columns from the MySQL query
		}
		return $targetArray;
		$resultTmp ->free();
		exit;		
	}
	
	//$result is to check if the statement returns any result or not
	if ($resultTmp = $theMySQLlink->query($theStatement)) { //$theMySQLlink->query($theStatement) is the same as mysqli_query($theMsSQLlink, $theStatement)

		/* fetch associative array */
		//mysqli-fetch-assoc gets data from the MySQL querry, and row by row, save into the variable $row
		//an associative array is an array that are flexible in naming the columns (e.g., using strings, $var['Word'], var['Meanings'], etc)
		// an numeric array only uses numbers to name the columns (e.g., $var[1][1], $var[1][2], etc)
		while($eachrow = mysqli_fetch_assoc($resultTmp)){
		$targetArray[] = $eachrow;//for each row, save the values in a row into the array $wordsToTest, which eventually has all rows and columns from the MySQL query
		}
		return $targetArray;
		$resultTmp ->free();		
	}
}

?>