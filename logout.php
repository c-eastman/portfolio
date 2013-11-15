<!-- 
	Author: Chris Eastman
    Site: net-head.ca
    File name: logout.php
    Purpose: The logout page destroys the session and redirects to the login page
-->
<?php
	session_start();

	$_SESSION["username"] = "";
	//delete session
	session_destroy();
	//redirect to login
	header("Location: http://www.net-head.ca/login.php"); // redirects	
?>