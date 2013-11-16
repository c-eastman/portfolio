<?php
/*
	Author: Chris Eastman
    Site: Net-head.ca
    File Name: formhandler.php
    Purpose: the formhandler authenticates a user to view secured pages if their log-in credentials are correct.
*/
session_start();

try{
	//database credentials
	$mySQLUsername = 'my_sql_username';
	$mySQLPassword = 'my_sql_password';
	$dsn = 'mysql:host=my_sql_host;dbname=my_sql_dbname';
	//create connection
	$database = new PDO($dsn, $mySQLUsername, $mySQLPassword);
}
catch(PDOException $ex)
{
	echo '<p>Sorry, there was a problem accessing the database.</p>
		  <a href="login.php">Try Again</a>';	
}

	//username and password from form
	$usernameFromUser = $_POST['username'];
	$passwordFromUser = $_POST['password'];
	
	//look for username in database
	$select_statement = "SELECT * FROM `admin` WHERE `username` = '$usernameFromUser'";
	$result = $database->query($select_statement);

	$counter = 0;
	$passwordFromDB = "";
	foreach($result as $row)
	{
		$counter++;
		// grab and store password from database
		$passwordFromDB = $row['password'];
	}
	
	//if no result, user does not exist
	if($counter < 1)
	{
		//alert dialog explaining issue
		echo "<script language=\"JavaScript\">\n";
		echo "alert('Username does not exist!');\n";
		echo "window.location='login.php'";
		echo "</script>";	
	}	
	else
	{
		//if user exists, compare password entered to password in database
		if($passwordFromUser == $passwordFromDB){
			//create session if successful
			$_SESSION["username"] = $usernameFromUser;
			//redirect to contact list
			header("Location: http://www.net-head.ca/businesscontacts.php"); // redirects
		}
		else
		{	
			//if password does not match, inform the user
			echo "<script language=\"JavaScript\">\n";
			echo "alert('Password is incorrect!');\n";
			echo "window.location='login.php'";
			echo "</script>";	
		}
	}
	
?>