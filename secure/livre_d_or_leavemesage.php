<?php 
include 'getResultLoginSecure.php';

if($_COOKIE["username"] && $_COOKIE["token"]){
        $result = verifyToken(unserialize($_COOKIE["username"]), unserialize($_COOKIE["token"]));
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
<?php
if ($result->num_rows > 0){
 	$message= $_GET["message"]."<br>" ;
 	$file="messages.txt"; 
 	file_put_contents($file,$message,FILE_APPEND);
 	$messages=file_get_contents($file);
 	echo  $messages;
}
 ?>
