<?php 
 
session_start();
session_destroy();
 
header("Location: Dashboard/pages/sign-in.php");
 
?>