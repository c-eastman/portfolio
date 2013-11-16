<?php
/*
	Author: Chris Eastman
    Site: Net-Head.ca
    File Name: contactdata.php
    Purpose: Retrieves information specific to the contact chosen
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
	
	//grab contacts name from url
	$current_contact = $_GET['name'];
	
	//prepare and execute select statement
	$select = $database -> prepare("SELECT * FROM business_contacts where name='".$current_contact."' LIMIT 1");
	$select -> execute();
	
	//save result
	$result = $select -> fetch();
	
	//if username session still exists
	if(isset($_SESSION["username"]))
	{ ?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>'Net-Head, get the 'net</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css"/>
	</head>
	
	<body>
    	<!-- Header With h1 image-replacement for logo -->
		<header>
        	<h1>'Net-Head</h1>
            <h2>Get the 'Net</h2>
        </header>
        
        <!-- Navigation with links to the rest of the site's pages -->
        <nav>
        	<div><a href="index.html">Home</a></div>
            <div><a href="about.html">About Me</a></div>
            <div><a href="projects.html">Projects</a></div>
            <div><a href="services.html">Services</a></div>
            <div><a href="https://github.com/c-eastman">GitHub</a></div>
            <div><a href="contact.html">Contact Me</a></div>
            <div><a href="businesscontacts.php" class="active">Contact List</a></div>
        </nav>
        <!-- Container -->
        <div id="wrapper" class="data">
        	<!-- Main Content Section-->
            <section id="main">
			  	<h1>Contact Information</h1>
                
                <ul>
                	<?php
						//list selected contact's information
							echo "<li>Name: ".$result["name"]."</li>
								 <li>Address: ".$result["address"]."</li>
								  <li>Phone Number: ".$result["phone"]."</li>
								  <li>Email: ".$result["email"]."</li>";
					?>
                </ul>
                <!-- Link to return to contacts list-->
                <a href="businesscontacts.php">Back to Contact List</a>
				
			  </section>
		</div>
        
        <!-- Footer with Copyright Statement-->  
        <footer class="data">
        	<p>Copyright &copy; Chris Eastman 2013</p>
        </footer>
	</body>
</html>
	<!-- If no session (they aren't signed in) return to login page-->
	<?php }else{
		header("Location: http://www.net-head.ca/login.php"); // redirects	
	}
?>
?>