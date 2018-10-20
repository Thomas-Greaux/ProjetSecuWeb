<?php
function getResultLogin($username, $password){
	$servernamedb = "127.0.0.1";
	$usernamedb = "secu";
	$passworddb = "secu";
	$dbname = "secudb";
	// Create connection
	$conn = new mysqli($servernamedb, $usernamedb, $passworddb, $dbname);
	// Check connection
	if ($conn->connect_error) {
   		die("Connection failed: " . $conn->connect_error);
	}
	// request with username and password
	$stmt = $conn->prepare("SELECT * FROM user where username= ? and password= ?");
	$stmt->bind_param("ss", $username, $password);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result;
}
?>