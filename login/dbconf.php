<?php
//DATABASE CONNECTION VARIABLES
$host = "127.0.0.1:3306"; // Host name
$username = "jin2099"; // Mysql username
$password = ""; // Mysql password
$db_name = "jinweb"; // Database name

//DO NOT CHANGE BELOW THIS LINE UNLESS YOU CHANGE THE NAMES OF THE MEMBERS AND LOGINATTEMPTS TABLES

$tbl_prefix = ""; //***PLANNED FEATURE, LEAVE VALUE BLANK FOR NOW*** Prefix for all database tables
$tbl_members = $tbl_prefix."members";
$tbl_attempts = $tbl_prefix."loginAttempts";