<?php
	session_start();
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
            <div><a href="contact.html">Contact</a></div>
        </nav>
        <!-- Container -->
        <div id="wrapper" class="business">
        	<!-- Main Content Section-->
            <section id="main">
			  	<h1>Contacts</h1>
			  	<p>Welcome <?php echo $_SESSION["username"]; ?> </p>
				<a href="logout.php">Logout</a>
			  </section>
		</div>
        
        <!-- Footer with Copyright Statement-->  
        <footer class="business">
        	<p>Copyright &copy; Chris Eastman 2013</p>
        </footer>
	</body>
</html>
	<?php }else{
		header("Location: http://www.net-head.ca/login.php"); // redirects	
	}
?>
