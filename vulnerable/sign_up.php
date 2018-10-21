<?php
if ($_POST["username"] && $_POST["password"]){
	$servernamedb = "127.0.0.1";
	$usernamedb = "secu";
	$passworddb = "secu";
	$dbname = "secudb";

	$username = $_POST["username"];
	$password = $_POST["password"];
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
	$stmt = $conn->prepare("INSERT INTO user (username, password, vip) VALUES (?, ?, 'false');");
	$stmt->bind_param("ss", $username, $password);
	$result = $stmt->execute();
}
?>

<html>
<body>
<?php
if($result) {
	echo "user creation success";
} else {
	echo "user creation failed";
}
?>
<form action='index.html'><input type='submit' value='Go to login page' /></form>
</body>
</html>