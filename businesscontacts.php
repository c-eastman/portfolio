<?php
	/*
	Author: Chris Eastman
    Site: Net-head.ca
    File Name: businesscontacts.php
    Purpose: If the user has been authenticated and allowed access to the database, this page shows a list of secured business contacts
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

	//prepare select statement to show all business contacts
	$select_statement = "SELECT * FROM business_contacts ORDER BY name;";
	
	//store results 
	$result = $database->query($select_statement);
	
	//if session exists (user is logged in) show the content
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
            <div><a href="#" class="active">Contact List</a></div>
        </nav>
        <!-- Container -->
        <div id="wrapper" class="business">
        	<!-- Main Content Section-->
            <section id="main">
			  	<h1>Contacts</h1>
                <!-- Welcome message and logout link-->
			  	<p>Welcome <?php echo $_SESSION["username"]; ?>! <a href="logout.php">Logout</a></p>
                <br>
                <ul>
                	<?php
						//show each of the business contacts in a list, each with a link to their personal information
						foreach($result as $row)
						{
							
							echo "<li><a href=\"contactdata.php?name=".$row["name"]."\">".$row["name"]."</a>";
						}
					?>
                </ul>
				
			  </section>
		</div>
        
        <!-- Footer with Copyright Statement-->  
        <footer class="business">
        	<p>Copyright &copy; Chris Eastman 2013</p>
        </footer>
	</body>
</html>
	<!-- if user is not signed in, redirect them to login page-->
	<?php }else{
		header("Location: http://www.net-head.ca/login.php"); // redirects	
	}
?>
