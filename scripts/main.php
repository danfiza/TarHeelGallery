<?php
header('Content-Type: application/json');
// Create connection
$con = mysqli_connect("localhost","censored","censored","censored");

// Check connection
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//We select all images that are not profile pictures from the database and send them as a json object
$query = 'SELECT * FROM Picture WHERE (ProfilePic = 0)';
$result = mysqli_query($con,$query);

$data = array();

while ($row = mysqli_fetch_object($result)){
	$row->points = intVal($row->upvotes) - intVal($row->downvotes);
	$data[] = $row;

}

echo json_encode( $data );
?>
