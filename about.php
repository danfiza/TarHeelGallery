<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/mystylesheet.css">
	<link href="css/popup.css" rel="stylesheet" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/user.js"></script>
	<title>About Us</title>
</head>
<body>
	<?php
	session_start();
// Create connection
	$con = mysqli_connect("localhost","censored","censored","censored");

// Check connection
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	} 
	?>
	<div class="main">
		<?php include("scripts/header.php"); ?>
		<div class="mainContent">
			<div id="Content">
				<div class="About_Content">
					<h1>About Us!</h1>
					<hr>
					<h3>Welcome to Tarheel Gallery!</h3>
					<p>This website was created by Eliezer Encarnacion and Danyal Fiza. We are both students at the fine University of UNC-Chapel Hill. We are partners for COMP 426: Advanced WWW Programming taught by Professor Ketan Mayer-Patel. Throughout the course we were taught the in’s and out’s of HTML5, Javascript, CSS, PHP, MYSQL, JSON encoding, RESTful interfaces, and Security. In order to bring all of these different things together into our final project, we decided to create a website to give back to our Chapel Hill community. This website can become a prime tool for prospective students wanting to get the feel of what it is like to be in Chapel Hill. This website is geared towards photographers of any range to upload pictures of the University and surrounding city and have them upvoted or downvoted by the Chapel Hill community. Snap, share, and have your photos provide meaning to the University you love.  </p>
				</div>
			</div> <!--upload-->
		</div><!--mainContent-->
		<div class="footer">
		</div><!--footer-->
	</div> <!--main-->	
</body>
</html>
