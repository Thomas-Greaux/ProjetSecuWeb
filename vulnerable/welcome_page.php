<?php 
include 'getResultLogin.php';

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