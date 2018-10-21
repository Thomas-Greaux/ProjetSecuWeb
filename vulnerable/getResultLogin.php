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
	// Alice's password = passwordofalice
	if($username != 'Bob'){
		$key = 'thisIsTheHashSecretKey';
		$password = sha1($password.$key);
	}
	// request with username and password
	$sql = "SELECT * FROM user where username='".$username."' and password='".$password."'";
	$conn->multi_query($sql);
	$result = $conn->store_result();
	return $result;
}
?>