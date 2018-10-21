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

<html>
<?php
$file="messages.txt";
$messages=file_get_contents($file);
 ?>

<head>
 <script>
   function encodeHTML(s) {
     return s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#x27;');
   }

   function save(){
        var callback = function () {
        var show=document.getElementById("show");
	show.innerHTML= xmlhttp.responseText;
     } ;
     var input=encodeHTML(document.getElementById("message").value);
     var url = "livre_d_or_leavemesage.php?message="+input;
     var xmlhttp = new XMLHttpRequest();
     xmlhttp.open('GET',url, true);
     xmlhttp.onreadystatechange = callback;
     xmlhttp.send(null);
 }


 </script>

</head>
<body>
<h1>Welcome to our Guest Book, Leave us a Message! </h1>
<input  id="message" >
<button onclick= 'save()' >Leave a message</button>
<h2>All the messages left by guests </h2>
<div id="show"><?php echo $messages?> </div>
</body>
</html>
