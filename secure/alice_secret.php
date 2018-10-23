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

<h1>Alice Secret</h1>
<div>
	<?php
	if($row["username"] == 'Alice'){
		echo "this is my secret: "; 

		$ivlen = openssl_cipher_iv_length("aes-128-gcm");
    	$iv = openssl_random_pseudo_bytes($ivlen);
	 	echo openssl_decrypt("85ZjW2nfbM61dOuM+bQm5Q==", "aes128", $row["password"]);
	} else {
		echo "you don't have access";
	}
	?>
</div>
</body>
</html>