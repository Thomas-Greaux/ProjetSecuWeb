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

<h1>VIP page</h1>
<div>
Important: this is NOT the SECRET SERVICE
</div>
<?php
if($row["vip"] == 'true'){
	echo "Welcome, you are a VIP member";
} else {
	echo "This is the VIP page: only vip members can access it.";
	echo " You are NOT a VIP member";
} 
?>
</body>
</html>