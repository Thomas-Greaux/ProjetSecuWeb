<?php 

include 'getResultLogin.php';

if($_POST["username"] && $_POST["password"]){
	$result = getResultLogin($_POST["username"], $_POST["password"]);
	if ($result->num_rows > 0){
		$row = $result->fetch_assoc();
		setcookie('username', serialize($_POST["username"]), time()+3600);
		setcookie('password', serialize($_POST["password"]), time()+3600);	
	}
}
else {
	if($_COOKIE["username"] && $_COOKIE["password"]){
		$result = getResultLogin(unserialize($_COOKIE["username"]), unserialize($_COOKIE["password"]));
		if ($result->num_rows > 0){
		$row = $result->fetch_assoc();
		}
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
		echo "<form action='welcome_page.php'><input type='submit' value='Go to welcome page' /></form>";
	} else {
			echo "<p>Login failed</p>";
			echo "<form action='index.html'><input type='submit' value='Return to login page' /></form>";
		}
?>
</body>
</html>
