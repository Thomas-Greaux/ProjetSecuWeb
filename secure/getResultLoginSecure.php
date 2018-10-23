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
	// request with username and password secure
	$stmt = $conn->prepare("SELECT * FROM user where username= ? and password= ?");
	$stmt->bind_param("ss", $username, $password);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result;
}

function setToken($username, $password) {
	$token = bin2hex(random_bytes(50));
	$date_token = date("Y-m-d H:i:s");

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
	// request with username and password secure
	$stmt = $conn->prepare("UPDATE user SET token= ?, token_date= ? WHERE username= ? AND password= ?");
	$stmt->bind_param("ssss", $token, $date_token, $username, $password);
	$result = $stmt->execute();
	return $token;
}

function verifyToken($username, $token){
	$servernamedb = "127.0.0.1";
	$usernamedb = "secu";
	$passworddb = "secu";
	$dbname = "secudb";

	$date_now = date("Y-m-d H:i:s", strtotime('-1 hour'));
	// Create connection
	$conn = new mysqli($servernamedb, $usernamedb, $passworddb, $dbname);
	// Check connection
	if ($conn->connect_error) {
   		die("Connection failed: " . $conn->connect_error);
	}
	// request with username and password secure
	$stmt = $conn->prepare("SELECT * FROM user where username= ? and token= ? and token_date > ?");
	$stmt->bind_param("sss", $username, $token, $date_now);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result;
}
?>