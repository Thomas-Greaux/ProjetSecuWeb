<?php 
header("Content-Security-Policy: default-src 'self'");
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

<html>
<?php 
$file="messages.txt";
$messages=file_get_contents($file);
 ?>

<head>
</head>
<body>
<h1>Welcome to our Guest Book, Leave us a Message! </h1>
<input  id="message" value=<?php echo "'".$_COOKIE["draft_mesage"]."'"; ?> >
<button id="leavemesagebutton" >Leave a message</button> 
<h2>All the messages left by guests </h2>
<div id="show"><?php echo $messages?> </div>
</body>
</html>
<script src="livre_d_or.js" ></script>