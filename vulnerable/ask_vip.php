<?php
if ($_POST["username"] && $_POST["phone"] && $_POST["email"]){
	$username = $_POST["username"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$blacklist_user = array('badguy', 'evil', 'John');
	if(in_array($username, $blacklist_user)){
		echo "you are blacklisted";
	} else {
		$xml = "<username>".$username."</username> <phone>".$phone."</phone> <email>".$email."</email>";
		// Assume we parse this xml string and add it in database
		echo "your demand is taken. Keep in touch !";
	}
}
?>