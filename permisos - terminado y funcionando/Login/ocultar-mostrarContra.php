<?php
   header('Content-Type: application/javascript');
?>

function ocultarContra(){
    let password=document.getElementById("Contra");
    if(password.type=="password"){
        password.type="text";
    }else{
        password.type="password";
    }
}
