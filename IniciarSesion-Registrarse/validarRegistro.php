<?php
    session_start();
    if(isset($_POST['validado'])){
        $_SESSION['registrar'] = $_POST['validado'];
    }
    header("Location: registrarse.php");
?>