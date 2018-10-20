<?php 
include 'getResultLoginSecure.php';

if($_COOKIE["username"] && $_COOKIE["password"]){
		$result = getResultLogin(unserialize($_COOKIE["username"]), unserialize($_COOKIE["password"]));
		if ($result->num_rows > 0){
		$row = $result->fetch_assoc();
		}
		else {
			header("Location: not_logged.html");
		}
	}
	else {
		header("Location: not_logged.html");
	}
?>

<!DOCTYPE html>
<html>
<body>

<h1>Welcome_page.php</h1>
<?php
		echo "<p>Welcome ".$row["username"]."</p>";
		echo "<form action='livre_d_or.php'><input type='submit' value='Go to guest book' /></form>";
		if($row["username"] == 'Alice'){
			echo "<div id='secret'><a href='alice_secret.html'>alice_secret.html</a></div>";
		}
?>
</body>
</html>