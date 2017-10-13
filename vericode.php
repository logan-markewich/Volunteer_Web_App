<?php

	session_start();
			
	//$_session['indexURL'] = getcwd();	
	//include ($_session['indexURL'].'/phptools.php'); //include the phptools
	include ('phptools.php');

 

success:

			$dbc = connectMySQL();//call the function connectMySQL to connect to MySQL;
			// the oldemail only have value in case of updating user info. for new user sign up, it is null
			if (empty($_SESSION['theoldemail'])){
				$theoldemail=null;
				//echo "the oldemail is null";
			}
			else {
				$theoldemail=$_SESSION['theoldemail']; //the existing email, which is specified in the 'changeinfo.php'	
				//echo "the old mail is ".$theoldemail;
			}
			
			$thenewemail=$_SESSION['thenewemail']; //get the email
			$vericode=$_SESSION['thevericode']; //the true vericode set by the system
			$thesubmitvericode=$_POST['vericode']; //the vericode submitted by the user (according to the email)
			//echo "the true vericode is ".$vericode."<br>";
			//echo 'the input vericode is '.$thesubmitvericode."<br>";

			// To protect MySQL injection (more detail about MySQL injection)
			$thesubmitvericode = stripslashes($thesubmitvericode); //stripslashes is to remove backslashes
			$thesubmitvericode = mysqli_real_escape_string($dbc, $thesubmitvericode);//the function is to prevent users play stricks so as to login without a password 
										//http://php.net/manual/en/function.mysql-real-escape-string.php

			//echo "oldemail".$theoldemail."<br>"."new email: ".$thenewemail."<br>"."thetrue vericode: ".$vericode."<br>"."the input vericode: ".$thesubmitvericode."<br>";

			//if the submitted vericode is not the one in the system, go back to the veriform
			if ($vericode <> $thesubmitvericode ){
				echo "The verificaiton code you input is not correct.<br>";
				echo "please re-input <a href=\"/epi/admin_pages/veriform.php\">the verification code </a>.";
				goto stop;
			}
			
			//if the vericode mathces
			//the following info comes from the update actions (changeinfo.php)
			$thenewpassword=$_SESSION['thenewpassword'];
			//the following comes from the new user set up (adduser.php)
			$thenewusername=$_SESSION['thenewusername'];

			//echo "oldemail".$theoldemail."<br>"."new email: ".$thenewemail."<br>"."thetrue vericode: ".$vericode."<br>"."the input vericode: ".$thesubmitvericode."<br>";
			//echo "newpassword".$thenewpassword."<br>"."new user: ".$thenewusername."<br>";

			//connect usertable and determine whether the mail address exists 
			//This php serves for adding new user (if the email does not exist), or update the user info (if the email exists)
			
			//check if the email(which is unqiue for each user) exists
			//if it exists, the process is to update email/password, in that case, the $_session['theoldemail'] has a non-blank value
			
			$tbl_name="members";
			$sql="SELECT * FROM $tbl_name WHERE email='$theoldemail'";//prepare the string as the MySQL code
			 // Table name
			//$sql=" call selectRows('$tbl_name', ' email=\'$theoldemail\' ') ";
			//$result returns a summary of the mySQL query object, incluidng lengths, number_rows, etc, it is not the data table;
			$result=mysqli_query($dbc, $sql); /*execute the query for MySQL, the $result is a list of records from the MySQL table 'users', which matches the query conditons*/
	
			// Mysql_num_row is counting table row
			$count=mysqli_num_rows($result); /*counting the rows*/

			
			//always close the connection;
			$dbc -> close();

			// If result matched $theusername and $the vericode, table row must be 1 row
			//in the following part, the reconnection to MySQL is necessary as it retrieves the user's id. 
			
			//if the user email exists, update with the new info
			if($count==1){
					//echo "the user exists";
					$dbc = connectMySQL();//call the function connectMySQL to connect to MySQL;
					//change the verification status to 1
					$tbl_name="members"; // Table name
					$sql1=" UPDATE users set veristatus= 1, email ='$thenewemail', password='$thenewpassword' WHERE email = '$theoldemail' ";
					$result1=mysqli_query($dbc, $sql1);

					//$sql2=" call selectRows('$tbl_name', ' email=\'$thenewemail\' ') ";
					$sql2="SELECT * FROM $tbl_name WHERE email ='$thenewemail'";
					//$result returns a summary of the mySQL query object, incluidng lengths, number_rows, etc, it is not the data table;
					$result2=mysqli_query($dbc, $sql2); /*execute the query for MySQL, the $result is a list of records from the MySQL table 'users', which matches the query conditons*/

					//to get the users, a view need to created, not just a macro to selectRows;
					$getuser=fetchMySQLData($dbc, $sql2, $result2);
					//get the userid, and save into a global variable
					//always close the connection;
					$dbc -> close();
					
					//after update, renew the current email, password
					$_SESSION['theemail']=$getuser[0]['email'];
					$_SESSION['thepassword']=$getuser[0]['password'];
					$_SESSION['theusername']=$getuser[0]['name'];
					
					//empty the oldmail session var;
					$_SESSION['theoldemail']=null;
					$_SESSION['thecurpassword']=null;
					$_SESSION['thenewemail']=null;
					$_SESSION['thenewpassword']=null;

					// save the value of $theusername into a global var $_SESSION, (the value of $theusername  stays in this page and won't be sent to the next page)
								//goto signup_success page
								
								//send and change the veristatus =1
								
								echo "Update is successfully completed! <br>";
								echo "Please <a href=\"/epi/admin_pages/login.html\">log in</a> your account.";
								}
			//if the email cannot be matched in the users table, it is a new account, add it to the user table
			else {
					//echo "the user is new";

					$dbc = connectMySQL();//call the function connectMySQL to connect to MySQL;
					$tbl_name="members"; // Table name
					//$sql3="  call addrow('users', 'name, password, email', ' \'$thenewusername\', \'$thenewpassword\', \'$thenewemail\' ' ) ";
					$sql3="INSERT INTO $tbl_name VALUES ('thenewfirstname', 'thenewlastname', 'thenewusername','thenewpassword','thenewemail')";
 					$result3=mysqli_query($dbc, $sql3); 
					// *execute the query for MySQL, add a row in the target table with new users*/
// 					//if $result=1, the row is successfully added

					//$sql4=" call selectRows('$tbl_name', ' email=\'$thenewemail\' ') ";
					$sql4="SELECT * FROM $tbl_name WHERE email ='$thenewemail'";
					//$result returns a summary of the mySQL query object, incluidng lengths, number_rows, etc, it is not the data table;
					$result4=mysqli_query($dbc, $sql4); /*execute the query for MySQL, the $result is a list of records from the MySQL table 'users', which matches the query conditons*/
					
					//to get the users, a view need to created, not just a macro to selectRows;
					$getuser=fetchMySQLData($dbc, $sql4, $result4);
					//get the userid, and save into a global variable
					//always close the connection;
					$dbc -> close();
					
					//after update, renew the current email, password
					$_SESSION['theemail']=$getuser[0]['email'];
					$_SESSION['thepassword']=$getuser[0]['password'];
					$_SESSION['theusername']=$getuser[0]['name'];
					
					$_SESSION['thenewemail']=null;
					$_SESSION['thenewpassword']=null;
					$_SESSION['thenewusername']=null;
					
					//session_start();
					//session_unset(); //session_unset removes values in the $_session variables
					//session_destroy(); //session_destroy does not remove values of the $_session variables;
										
					//echo "now mail".$getuser[0]['email']."<br>"."now user: ".$getuser[0]['name']."<br>"."now password: ".$getuser[0]['password']."<br>";
					echo "Sign up is complete! Please <a href=\"/epi/admin_pages/login.html\">log in </a> your account.";
			}

stop:
?>
