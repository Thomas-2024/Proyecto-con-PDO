<?php
session_start();
    try {
        include '../conectar/conexion.php';
        $Correo = $_POST['Correo'];
        $Contraseña = $_POST['Contra'];
        // Validar que el correo y contraseña no estén vacíos
        if (empty($Correo) || empty($Contraseña)) {
            header("Location: index.php");
            $_SESSION['mensaje'] = '4'; //campos vacios
            exit();
        }
        // Validar que el correo sea válido
        if (!filter_var($Correo, FILTER_VALIDATE_EMAIL)) {
            header("Location: index.php");
            $_SESSION['mensaje'] = '5'; //Correo invalido
            exit();
        }
        $sql = "SELECT * FROM cuentas WHERE correo = '$Correo'";
        $sentencia = $Miconexion->prepare($sql);
        $sentencia->execute();
        $usuario = $sentencia->fetch(PDO::FETCH_ASSOC);
        if ($usuario) {
            if ($usuario['Contrasena'] === $Contraseña){
                $_SESSION['usuario'] = $usuario['Nombre'];
                $_SESSION['rol'] = $usuario['rol'];
                $_SESSION['rol_logeo'] = $usuario['rol'];
                $_SESSION['mensaje'] = '1'; //Inicio sesion correctamente
                header("Location: index.php");
            }
            else {
                header("Location: index.php");
                $_SESSION['mensaje'] = '2'; //Contraseña incorrecta
            }
        } else {
            header("Location: index.php");
            $_SESSION['mensaje'] = '3'; //Correo no registrado
            $_SESSION['CorreoError'] = $Correo;
        }
    }
    catch(PDOException $e) {
        echo "Error: ". $e->getMessage();
    }
    // Cerrar la conexión
    $Miconexion = null;
    exit();
?>