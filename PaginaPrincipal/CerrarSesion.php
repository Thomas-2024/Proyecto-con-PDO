<?php
    session_start();

    session_destroy();
    header("Location: ../IniciarSesion-Registrarse/IniciaSesion.php");
?>