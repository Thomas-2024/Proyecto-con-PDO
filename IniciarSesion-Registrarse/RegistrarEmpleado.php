<?php
    session_start();
    try {
    include_once '../Uso_multiple/Conexion.php';
    $Miconexion = MiConexion();
    include "../Uso_multiple/CapturarDatosEmpleados.php";

    // Validar que el nombre y contraseña no estén vacíos
    $_SESSION['id'] = $Id;
    $_SESSION['nombre'] = $Nombre;
    $_SESSION['edad'] = $Edad;
    $_SESSION['rol'] = $Rol;
    $_SESSION['correo'] = $Correo;
    $_SESSION['contrasena'] = $Contraseña;
    $_SESSION['confirmar_contrasena'] = $ConfirmarContraseña;
    $_SESSION['telefono'] = $Telefono;
    $_SESSION['Img_perfil'] = $dir_img_perfil;
    
    if (empty($Id) || empty($Nombre) || empty($Rol) || empty($Correo) || empty($Contraseña) || empty($ConfirmarContraseña)) {
        $_SESSION['mensaje'] = '4';  //campos vacios
        header("Location: FormularioRegistrarse.php");
        exit();
    }
    // Validar que el correo sea valido
    if (!filter_var($Correo, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['mensaje'] = '5';  //correo invalido
        header("Location: FormularioRegistrarse.php");
        exit();
    }

    // Validar que las contraseñas coincidan
    if($Contraseña !== $ConfirmarContraseña){
        $_SESSION['mensaje'] = '8'; //contraseñas no coinciden
        header("Location: FormularioRegistrarse.php");
        exit();
    }
    //Validar que la id no este repetida
    $sqlId = "SELECT COUNT(*) as cuenta FROM empleados WHERE id_empleado = '".$Id."'";
    $Lista_ids = $Miconexion->prepare($sqlId);
    $Lista_ids->execute();
    $resultIds = (int) $Lista_ids->fetchColumn();
    if($resultIds > 0){
        $_SESSION['mensaje'] = '6.1';  //id repetido
        $_SESSION['Idrep'] = $Id;
        header("Location: FormularioRegistrarse.php");
        exit();
    }


    // Validar que el correo no este repetido
    $sqlCorreo = "SELECT COUNT(*) as cuentas FROM empleados WHERE Correo = '$Correo'";
    $ListaCorreos = $Miconexion->prepare($sqlCorreo);
    $ListaCorreos->execute();
    $resultCorreos = (int) $ListaCorreos->fetchColumn();
    if ($resultCorreos > 0) {
        $_SESSION['mensaje'] = '6.2';  //correo repetido
        $_SESSION['CorreoRep'] = $Correo;
        header("Location: FormularioRegistrarse.php");
        exit();
    }

    if (isset($_POST['Codigo']) && $Rol == "1") {
        $codigo = $_POST['Codigo'];
        if($codigo != "20756"){
            $_SESSION['mensaje'] = '9';
            $validado = false;
            header("Location: FormularioRegistrarse.php");
            exit();
        } else {
            $_SESSION['mensaje'] = '7';
            $validado = true;
            header("Location: FormularioRegistrarse.php");
        }
    }else {
        $_SESSION['mensaje'] = '7';
        $validado = true;
    }
    // Si todo está bien, insertar los datos en la base de datos        
    $sentencia_insert = $Miconexion->prepare('INSERT INTO empleados VALUES(:Id, :id_rol, :Nombre, :Edad, :Correo, :Contrasena, :Telefono, :Img_perfil)');
    $sentencia_insert->execute(array(
        ':Id'=>$Id,
        ':id_rol'=>$Rol,
        ':Nombre'=>$Nombre,
        ':Edad'=>$Edad,
        ':Correo'=>$Correo,
        ':Contrasena'=>$Contraseña,  //Se debe encriptar la contraseña antes de insertarla en la base de datos
        ':Telefono'=>$Telefono,
        ':Img_perfil'=>$dir_img_perfil
    ));

    //destruir las sesiones con el valor de los datos del formulario con unset
    if($validado == true){
        unset($_SESSION['id']);
        unset($_SESSION['nombre']);
        unset($_SESSION['edad']);
        unset($_SESSION['rol']);
        unset($_SESSION['correo']);
        unset($_SESSION['contrasena']);
        unset($_SESSION['confirmar_contrasena']);
        unset($_SESSION['telefono']);
        unset($_SESSION['Img_perfil']);
    }
    header("Location: IniciaSesion.php");
    exit();
    } catch(PDOException $e) {
    echo "<br>". $e->getMessage();
    exit();
    }//}
?>