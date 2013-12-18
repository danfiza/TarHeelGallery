<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="css/comment.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="css/mystylesheet.css">
	<link href="css/lightbox.css" type="text/css" rel="stylesheet" />
	<link href="css/gallerystyle.css" type="text/css" rel="stylesheet" />
	<link href="css/popup.css"  type="text/css" rel="stylesheet" />
	<link href="css/popup_comment.css" type="text/css" rel="stylesheet" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
	<script src="js/lightbox-2.6.min.js"></script>
	<script src="js/comment.js"></script>
	<script src="js/gallery.js"></script>
	<script src="js/main.js"></script>
	<script src="js/Comment_class.js"></script>
	<script src="js/user.js"></script>
	<title>UNC Images</title>
</head>
<body>
	<div class="main">
		<?php session_start();include("scripts/header.php"); ?>
		<div class="mainContent">
			<div id="Content">
				<div class="UserContainer">
					<ul class="usernames">
					</ul>
				</div>
				<div class="Gallery_Container">
					<div id="galleryScroll">
					</div>
				</div>
			</div>
		</div><!--mainContent-->
		<div class="footer">
		</div><!--footer-->
	</div> <!--main-->	
</body>
</html>
