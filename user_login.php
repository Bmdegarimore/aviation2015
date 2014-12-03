<?php
// Start Session
session_start();

// Start the buffer
ob_start();

ini_set('display_errors',1); 
 error_reporting(E_ALL);

//Database
require "db.php";

try {
	$dbh = new PDO("mysql:host=$hostname;
					dbname=caseym_Aviation", $username, $password);
} catch (PDOException $e){
	echo $e->getMessage();
}
 $tbl_name = "UserInfo";

// Define $myusername and $mypassword from User Form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];


$sql="SELECT * FROM $tbl_name WHERE email='$myusername' and password='$mypassword'";
$result=$dbh->query($sql);

// Mysql_num_row is counting table row
$count=$result->rowCount();

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){

// Register $myusername, $mypassword and redirect to file "user_login_success.php"
$_SESSION["myusername"] = $myusername;
$_SESSION["mypassword"]= $mypassword;
header("location:main.php");
}
else {
echo "Wrong Username or Password";
}

ob_end_flush();
?>
