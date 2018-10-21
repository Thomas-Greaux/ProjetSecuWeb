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
    document.cookie = "draft_mesage" + "=" + "; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";     
}

function saveCurrentDraftInput() {
    var value = document.getElementById("message").value
    var d = new Date();
    d.setTime(d.getTime() + (1*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = "draft_mesage" + "=" + value + ";" + expires + ";path=/";
}
leavemesagebutton = document.getElementById('leavemesagebutton');
leavemesagebutton.addEventListener("click", function(){save();}, false);

message = document.getElementById('message');
message.addEventListener('onchange', function(){saveCurrentDraftInput();}, false);