<?php 

session_start();  // ensure session is true 
session_destroy();
header("location:login.php"); // redirect to login page 

?>