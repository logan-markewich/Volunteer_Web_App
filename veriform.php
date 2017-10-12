<?php
	session_start();

	$theusername=$_SESSION['thenewusername'];
	$thenewemail=$_SESSION['thenewemail'];
	if (empty($_SESSION['thenewusername']) <> 1){
		$showuser=$_SESSION['thenewusername'];
	}
	else{
		$showuser=$theusername;	
	}
	//echo "ok".$theusername;
	//echo "ok".$theemail;
	echo "<h2> Account Verification </h2>"."<br>";
	echo "Username: ".$showuser."<br>";
	echo "email: ".$thenewemail."<br>";
	echo "<br><br>";

?>
<html>
	<head>
		<script src='https://www.google.com/recaptcha/api.js' async defer></script>
	</head>
	<body>

		<div>
			<form name="veri" method="post" action="vericode.php"> 
			<!-- the form is named "veri", when the submit button is clicked, it goes to the page "vericode.php"-->
				verification code: <input name="vericode" type="text" id ="vericode" autofocus>
				<br><br>
				<!-- the snippet of CAPTCHA -->
				<div class="g-recaptcha" data-sitekey="6LeY0yYUAAAAAP-ZI3jwj_MVHEOIlKF95Cx3F0uq"></div>
				<!-- the submit button is named "submit", when the submit button is clicked, it executes the action specified in the form statment-->
				<input name="submit" type="submit" value ="Verify your account"/>
				<br><br><br>
			</form>
		<div>
	</body>
</html>