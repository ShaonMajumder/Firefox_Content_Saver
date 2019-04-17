<?php
if(empty($_POST['key_need']) == True){
	$category = $_POST["tag"];
	$url =  $_POST["url"];
	$title = $_POST["title"];
	$solution = $_POST["solution"];
	$post_key = $_POST['postkey'];

	file_put_contents("debug.txt", $title . " - " . $url);

}

$servername = "localhost";
$username = "root";
$password = "sh170892";
$dbname = "fitness-project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(empty($_POST['key_need']) == False){
	$sql = "SELECT * FROM `data` WHERE `postkey` = '".$_POST['key_need']."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo $row["postkey"];
	    }
	} else {
	    echo "No Match key";
	}
}else{
	$sql = "INSERT INTO `data` (`title`, `resource_url`, `category`,`solution`,`postkey`)
	VALUES ('".$title."', '".$url."','".$category."','".$solution."','".$post_key."')";
	$conn->query($sql);

	$sql = "SELECT * FROM `data` WHERE `postkey` = '".$post_key."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo $row["postkey"];
	    }
	} else {
	    echo "0 results";
	}	
}


$conn->close();

?>