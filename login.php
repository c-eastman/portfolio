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
        <!-- Container, Some About Specific Styles -->
        <div id="wrapper" class="businesslogin">
        	<!-- Main Content Section-->
            <section id="main">
	<h1>Business Contact List</h1>
	<h2>Log In to view contacts</h2>
	<form action="formhandler.php" method="post">
    	Username: <input type="text" name="username" />
        <br>
        Password: <input type="password" name="password" />
       	<br>
        <input type="submit" name="submit" />
    </form>
 </section>
		        
		</div>
        
        <!-- Footer with Copyright Statement-->  
        <footer class="businesslogin">
        	<p>Copyright &copy; Chris Eastman 2013</p>
        </footer>
	</body>
</html>