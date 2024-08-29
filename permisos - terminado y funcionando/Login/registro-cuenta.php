<?php
    session_start();
    try {
    include '../conectar/conexion.php';
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Correo = $_POST['CorreoReg'];
    $Contraseña = $_POST['ContraReg'];
    $Rol = $_POST['Rol'];
    // Validar que el nombre y contraseña no estén vacíos
    if (empty($Nombre) || empty($Apellido) || empty($Correo) || empty($Contraseña) || empty($Rol)) {
        $_SESSION['mensaje'] = '4';  //campos vacios
        header("Location: registrarse.php");
        exit();
    }
    // Validar que el correo sea valido
    if (!filter_var($Correo, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['mensaje'] = '5';  //correo invalido
        header("Location: registrarse.php");
        exit();
    }
    // Validar que el correo no este repetido
    $sql = "SELECT COUNT(*) as cuenta FROM cuentas WHERE Correo = '$Correo'";
    $ListaCorreos = $Miconexion->prepare($sql);
    $ListaCorreos->execute();
    $result = $ListaCorreos->fetch(PDO::FETCH_ASSOC);
    if ($result['cuenta'] > 0) {
        $_SESSION['mensaje'] = '6';  //correo repetido
        $_SESSION['CorreoRep'] = $Correo;
        header("Location: registrarse.php");
        exit();
    }
    // Si todo está bien, insertar los datos en la base de datos
    $sql = "INSERT INTO cuentas (Nombre, Apellido, rol, Correo, Contrasena) VALUES ('$Nombre', '$Apellido', '$Rol', '$Correo', '$Contraseña')";
    $Miconexion->exec($sql);
    $_SESSION['mensaje'] = '7';  //Se registro la cuenta correctamente
    $Miconexion = null;
    header("Location: registrarse.php");
    } catch(PDOException $e) {
    echo $sql. "<br>". $e->getMessage();
    exit();
    }

?>