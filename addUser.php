<?php
			//echo $_SERVER["REQUEST_URI"];
			//echo $_SERVER["REQUEST_ROOT"];
			
			//echo '</br>';
			
			session_start();
			
			$_session['indexURL'] = getcwd();	//$_SERVER["REQUEST_URI"];		
		
			//include ($_SERVER['DOCUMENT_ROOT'].'/cmpt370_2/phptools.php'); //include the phptools
			include ($_session['indexURL'].'/phptools.php'); //include the phptools
			
			//echo  getcwd();
			
			//session_start();


			//session_start(); //it is critical to have it here, so as to remember all the global var values henceforward
										//if the above line is disabled, the session_start() does not remmeber the global value until the first line in login-success.php;
										//as such, the $_session['theusername'] on the login-success.php won't have any value;

	success:
									
			//connect to the database and check if the user already exists
			$dbc = connectMySQL();//call the function connectMySQL to connect to MySQL;
			//$dbc -> close();	
			
			// the username and password sent from form 
			$thenewfirstname = $_POST['firstName'];
			$thenewlastname = $_POST['lastName'];
			$thenewemail=$_POST['email']; 
			$thenewusername=$_POST['usrname']; 
			$thenewpassword=$_POST['pwd']; 
			
			
// 			echo "the user info: $theusername; $thepassword; $theemail";br();

			// To protect MySQL injection (more detail about MySQL injection)
			$thenewusername = stripslashes($thenewusername); //stripslashes is to remove backslashes
			$thenewpassword = stripslashes($thenewpassword);
			$thenewfirstname = stripslashes($thenewfirstname);
			$thenewlastname = stripslashes($thenewlastname);
			$thenewemail = stripslashes($thenewemail);
			//$thenewusername = mysqli_real_escape_string($dbc, $thenewusername);//the function is to prevent users play stricks so as to login without a password 
										//http://php.net/manual/en/function.mysql-real-escape-string.php
			$thenewpassword = mysqli_real_escape_string($dbc, $thenewpassword);
			$thenewemail = mysqli_real_escape_string($dbc, $thenewemail);

			//save these new values into session vars, these values are not to be stored in the user table until verification is completed
			$_SESSION['thenewusername']=$thenewusername;
			$_SESSION['thenewpassword']=$thenewpassword;
			$_SESSION['thenewemail']=$thenewemail;
			$_SESSION['thenewfirstname']=$thenewfirstname;
			$_SESSION['thenewlastname']=$thenewlastname;

			//echo $thenewusername."<br>".$thenewpassword."<br>".$thenewemail;
			//goto stop;			
			
			if ($thenewusername==null or $thenewpassword==null or $thenewemail == null){
				echo "The user name, password, or email address cannot be left blank, go back to the <a href=\"signUp.html\">sign up</a> page and retry.";
			}
			else {
echo "line 51".$thenewusername;
echo '</br>';
echo "line 52".$thenewemail;
					
						//select rows matching the username or the email address, so as to reject adding new users if the username or email address exists
						//It is simpler, safer, and more reliable to call procedures instead of putting statements directly;
						//$sql=" call selectRows('members', ' username=\'$thenewusername\' or email= \'$thenewemail\'  ') ";
						$sql = "SELECT username, email FROM members where username = '$thenewusername' or email='$thenewemail' ";
						//$result = mysqli_query($dbc, "SELECT email from members");
						$result=mysqli_query($dbc, $sql); /*execute the query for MySQL, the $result is a list of records from the MySQL table 'users', which matches the query conditons*/
//echo "line 57".$result;
						// Mysql_num_row is counting table row
						$count=mysqli_num_rows($result); /*counting the rows*/
						echo "count= $count </br>";
						//always close the connection;
						$dbc -> close();
						
						// If the new user name or email does not match existing users or email addresses, the count ==0;
						if($count ==0){
											// the username or email address was not used
											
											//after myslqi_query, the connect is shut off, so the following lines reconnect to the host and select db
											//$dbc = connectMySQL();//call the function connectMySQL to connect to MySQL;
											
											//randomly generate a verficaiton code of 6 digitals
											$vericode=mt_rand(100000, 999999);
											//save the vericode into the database
											$_SESSION['thevericode']=$vericode;

											goto vericode;
								
						}
						else {
									echo "The user name or email address has been taken, go back to the <a href=\"signUp.html\">sign up</a> page, retry by using another user or email address";
									exit;
									}
			}
			
vericode:

	//phpmailer
	//https://www.youtube.com/watch?v=U13smZvdArI
	//https://github.com/PHPMailer/PHPMailer/wiki/Tutorial
	//https://github.com/PHPMailer/PHPMailer
	//include ($_SERVER['DOCUMENT_ROOT'].'/cmpt370/Volunteer_Web_App/phptools.php')
	require_once($_session['indexURL'].'/PHPMailer/PHPMailerAutoload.php');
	$mail = new PHPMailer();
	$mail -> isSMTP();
	$mail -> SMTPAuth=true;
	$mail -> SMTPSecure = 'ssl';
	$mail -> Host = 'smtp.gmail.com';
	$mail -> Port = '465';
	$mail -> isHTML();
	$mail -> Username = 'cmpt37005@gmail.com';
	$mail -> Password = 'cmpt370-05';
	$mail -> SetFrom('noreply@epilearning.org', 'Volunt-EZ SignUp');//The first part (address) is ignored by gmail sever
		//because gmail does not allow faked email address.
	// $mail -> AddReplyTo('noreply@epilearning.org', 'SignUp Verification');
	$mail -> Subject = 'Sign up Confirmaiton';
	$mail -> Body = 'Congratulations! You have successfully signed up or update your account at the epi learning projects.'."<br>".'To active your account, please go back to the sign up page, and enter the verification code: <b>'.$vericode.'</b>.'."<br>"."<b>Important!:</b> this is an auto-note, please do not reply to it.";
	$mail -> AddAddress($thenewemail);
	$mail -> Subject = 'Sign up Verification';
	$mail -> Send();
	echo 'email sent to '.$thenewemail;
	br();
	//echo ("location:".$_session['indexURL']."/veriform.php");br();
	//header("location:/Applications/XAMPP/xamppfiles/htdocs/cmpt370_2/veriform.php");
	//header("location:".$_session['indexURL']."/veriform.php");
	header("location:veriform.php");	
stop:
?>