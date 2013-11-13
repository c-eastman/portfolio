<?php
	session_start();
	if(isset($_SESSION["username"]))
	{
		echo '<!DOCTYPE html>
			  <html>
			  <body>
			  	<h1>Contacts</h1>
			  	<p>Welcome ' . $_SESSION["username"] .' </p>
				<a href="logout.php">Logout</a>
			  </body>
			  </html>';
	}else{
		header("Location: http://www.net-head.ca/login.php"); // redirects	
	}
?>
