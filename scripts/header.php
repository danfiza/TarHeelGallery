<div class ="head"> <p> Welcome, 
	<?php 
	if (isset($_SESSION['login']))
	{
		echo $_SESSION['user'];
		echo '! <a href="#" OnClick="return false;" class="logout">Logout</a>';
	} else if(isset($_COOKIE["asf4s2wr5"])){
		$value = $_COOKIE["asf4s2wr5"];
		$firstremove = str_replace("p9ir", "", $value);
		$secondremove = str_replace("troaw34a7a937f", "", $firstremove);


		$con = mysqli_connect("localhost","censored","censored","censored");
		if (!$con)
		{
			echo "Connection error: " . mysqli_connect_error()."";
		}
		$result = mysqli_query($con,"SELECT * FROM User WHERE id = '". $secondremove ."' ");
		$row = mysqli_fetch_array($result);
		$_SESSION['user'] =  $row['first']; 
		$_SESSION['username'] = $row['login'];
		$_SESSION['login'] = "true";
		$_SESSION['id'] = intval($row['id']);
		$_SESSION['profilepic'] = $row['profilepic'];
		echo '<meta http-equiv="refresh" content="0">';

	}
	else echo 'Guest. <a href="#" OnClick="return false;" class="login">Login</a> or <a href="#" OnClick="return false;" id="register">Register Now!</a>'; ?></p></div>
	<div class="logo">
		<h1> Tar Heel Gallery </h1>
	</div><!-- logo place holder -->
	<div class = "header">
		<div class ="menu">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="gallery.php">Galleries</a></li>
				<li><a href="upload.php">Upload</a></li>
				<li><a href="about.php">About</a></li>
			</ul>
		</div><!-- Menu-->
	</div><!--Header -->
