<?php
	session_start();

	$_SESSION["username"] = "";

	session_destroy();
	
	header("Location: http://www.net-head.ca/login.php"); // redirects	
?>