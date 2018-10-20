<?php 
if($_POST["username"] && $_POST["password"]){
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
	$sql = "SELECT * FROM user where username='".$_POST["username"]."' and password='".$_POST["password"]."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		$row = $result->fetch_assoc();
		setcookie('username', serialize($row["username"]), time()+3600);
		setcookie('password', serialize($row["password"]), time()+3600);	
	}
}
?>

<!DOCTYPE html>
<html>
<body>

<h1>Authentication.php</h1>
<?php
	if ($result->num_rows > 0){
		echo "<p>Login successful. Hello ".$row["username"]." with password ".$row["password"]."</p>";
	} else {
			echo "<p>Login failed</p>";
		}
?>
</body>
</html>
