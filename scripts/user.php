<?php
header('Content-Type: application/json');
session_start();
$resp = new stdClass();
// Create connection
$con = mysqli_connect("localhost","censored","censored","censored");

// Check connection
if (mysqli_connect_errno($con))
{
	$resp->error = "Failed to connect to MySQL: " . mysqli_connect_error();
	echo json_encode( $resp );
}
//Check if which information we were given and store their escaped strings
if(isset($_POST['username'])){
	$user = mysqli_real_escape_string($con,$_POST['username']);
}
if(isset($_POST['password'])){
	$pass = mysqli_real_escape_string($con,$_POST['password']);
}
if(isset($_POST['type'])){
	$type = mysqli_real_escape_string($con,$_POST['type']);
}
if(isset($_POST['firstn'])){
	$first = mysqli_real_escape_string($con,$_POST['firstn']);
}
if(isset($_POST['lastn'])){
	$last = mysqli_real_escape_string($con,$_POST['lastn']);
}
if(isset($_POST['emailn'])){
	$email = mysqli_real_escape_string($con,$_POST['emailn']);
}
//check if the type is a login, then we procced to log user in if valid
if($type === "login"){
	$result = mysqli_query($con,"SELECT * FROM User WHERE login = '". $user ."' ");
	if (mysqli_num_rows($result) == 0) { //we would get a 0 result if the username was nonexistant
		$resp->logged = false;
		$resp->error = "Username does not exist";
	} else{
		$hashed_password = crypt($pass, "4f");
		
		$row = mysqli_fetch_array($result);
		if($row['password'] == $hashed_password){
			$_SESSION['user'] =  $row['first'];
			$_SESSION['username'] = $row['login'];
			$_SESSION['login'] = "true";
			$_SESSION['id'] = intval($row['id']);
			$_SESSION['profilepic'] = $row['profilepic'];
			$resp->logged = true;
			if(!isset($_COOKIE["asf4s2wr5"])){
				setcookie("asf4s2wr5", "p9ir".$_SESSION['id']."troaw34a7a937f", time()+3600*24, "/TarheelGallery/", $domain, true);}
			} else{
				$resp->logged = false;
				$resp->error = "Password is incorrect.";
			}
		}
	}
//perform the following statement if user requests to logout
	if($type === "logout"){
		if(isset($_COOKIE["asf4s2wr5"])){
			unset($_COOKIE["asf4s2wr5"]);
			setcookie("asf4s2wr5", null, time()-3600*24, "/TarheelGallery/", $domain, true);}
			if(isset($_SESSION['user'])){
				unset($_SESSION['user']);
			}
			if(isset($_SESSION['username'])){
				unset($_SESSION['username']);
			}
			if(isset($_SESSION['login'])){
				unset($_SESSION['login']);
			}
			if(isset($_SESSION['id'])){
				unset($_SESSION['id']);
			}
			session_destroy();
		}

//If user requests to register, then we register and place the user's data into our database
		if($type === "register"){
			$day = date("Y-m-d");
			$result = mysqli_query($con,"SELECT * FROM User WHERE login = '". $user ."' ");
			if (mysqli_num_rows($result) == 0) {
				$hashed_password = crypt($pass,"4f");



				$sql = "INSERT INTO User (id,first, last, login, password, email, created, profilepic)
				VALUES ('null','$first', '$last', '$user', '$hashed_password', '$email', '$day', 9)";
				$result = mysqli_query($con,$sql);
				if (!$result)
				{
					$resp->error = "MYSQL error";

				}
				$resp->logged = true;

			} else{
				$resp->error = "Username Already Exists";
				$resp->logged = false;
			}
		}
		$Y = 0;
		$data = array();
		if($type === "retrieve"){
			$query = 'SELECT * FROM User';
			$result = mysqli_query($con,$query);
			$Y=1;

			while ( $row = mysqli_fetch_array($result)){
				$data[] = ($row);
			}
		}
		if($Y === 0){
			echo json_encode( $resp );
		}
		else{echo json_encode( $data );}

		?>
