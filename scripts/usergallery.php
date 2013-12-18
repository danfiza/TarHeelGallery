<?php
header('Content-Type: application/json');
// Create connection
$con = mysqli_connect("localhost","censored","censored","censored");

// Check connection
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//Check the type of request
if(isset($_POST['type'])){
	$type = mysqli_real_escape_string($con,$_POST['type']);
}
//Check if username is requested
if(isset($_POST['username'])){
	$user = mysqli_real_escape_string($con,$_POST['username']);
}
$data = array();
//If the request type is gallery, then we fullfil the request of getting the user's uploaded images
if($type === "gallery"){
	$query = 'SELECT * FROM Picture WHERE (author ="'.$user.'"AND ProfilePic = 0)';
	$result = mysqli_query($con,$query);



	while ( $row = mysqli_fetch_array($result)){
		$data[] = ($row);
	}
}

echo json_encode( $data );
?>