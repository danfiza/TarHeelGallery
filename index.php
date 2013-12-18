<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/mystylesheet.css">
	<link href="css/lightbox.css" rel="stylesheet" />
	<link href="css/popup.css" rel="stylesheet" />
	<link href="css/popup_comment.css" rel="stylesheet" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
	<script src="js/lightbox-2.6.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/user.js"></script>
	<title>UNC Images</title>
</head>
<body>
	<div class="main">
		<?php session_start(); include("scripts/header.php"); ?>
		<div class="mainContent">
			Sort pictures by
			<select>
				<option value=""></option>
				<option value="author"> Author </option>
				<option value="points"> Points </option>
				<option value="date"> Date Uploaded </option>
			</select>
			<br>
			<div id="imageScroll">
			</div><!-- imageScroll -->    
		</div><!--mainContent-->
		<div class="footer">
		</div><!--footer-->
	</div> <!--main-->	
</body>
</html>
