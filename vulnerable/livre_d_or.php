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
    function save(){ 
        var callback = function () {     
        var show=document.getElementById("show"); 
	show.innerHTML= xmlhttp.responseText;       
     } ; 
     var input=document.getElementById("message").value;
     var url = "livre_d_or_leavemesage.php?message="+input;
     var xmlhttp = new XMLHttpRequest();	    
     xmlhttp.open('GET',url, true);
     xmlhttp.onreadystatechange = callback;
     xmlhttp.send(null); 
     document.cookie = "draft_mesage" + "=" + "; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";     
    }

    function saveCurrentDraftInput() {
        var value = document.getElementById("message").value
        var d = new Date();
        d.setTime(d.getTime() + (1*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = "draft_mesage" + "=" + value + ";" + expires + ";path=/";
    }

 </script>

</head>
<body>
<h1>Welcome to our Guest Book, Leave us a Message! </h1>
<input  id="message" onchange= 'saveCurrentDraftInput()' value=<?php echo "'".$_COOKIE["draft_mesage"]."'"; ?> >
<button onclick= 'save()' >Leave a message</button> 
<h2>All the messages left by guests </h2>
<div id="show"><?php echo $messages?> </div>
</body>
</html>