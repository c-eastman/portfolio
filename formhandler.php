<?php
session_start();

try{
	//database credentials
	$mySQLUsername = 'my_sql_username';
	$mySQLPassword = 'my_sql_password';
	$dsn = 'mysql:my_sql_host.com;dbname=my_sql_database';
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
	
	$select_statement = "SELECT * FROM `admin` WHERE `username` = '$usernameFromUser'";

	$result = $database->query($select_statement);

	$counter = 0;
	$passwordFromDB = "";
	foreach($result as $row)
	{
		$counter++;
		$passwordFromDB = $row['password'];
	}
	
	if($counter < 1)
	{
		echo "<h1>User does not exist</h1>";	
	}	
	else
	{
		if($passwordFromUser == $passwordFromDB){
			$_SESSION["username"] = $usernameFromUser;
			header("Location: http://www.net-head.ca/businesscontacts.php"); // redirects
		}
		else
		{
			echo "<h1>Password incorrect</h1>";	
		}
	}
	
?>