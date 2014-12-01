<?php

ini_set('display_errors',1); 
 error_reporting(E_ALL);
 
 session_start();
 ob_start();
 if(empty($_SESSION["myemail"])){
    header("location:login.php");
 }
 ?>

 <html>
 <body>
 Login Successful
 </body>
 </html>
 <?php
 //Flush buffer
 ob_flush();
?>