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
	$sql = "SELECT * FROM user where username='".$username."' and password='".$password."'";
	$result = $conn->query($sql);
	return $result;
}

if($_COOKIE["username"] && $_COOKIE["password"]){
		$result = getResultLogin(unserialize($_COOKIE["username"]), unserialize($_COOKIE["password"]));
		if ($result->num_rows > 0){
		$row = $result->fetch_assoc();
		}
	}
?>

<!DOCTYPE html>
<html>
<body>

<h1>Welcome_page.php</h1>
<?php
	if ($result->num_rows > 0){
		echo "<p>Welcome ".$row["username"]."</p>";
	} else {
			echo "<p>You are not logged in</p>";
			echo "<form action='index.html'><input type='submit' value='Go to login page' /></form>";
		}
?>
</body>
</html>