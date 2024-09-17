<?php
session_start();
    try {
        include_once '../Uso_multiple/Conexion.php';;
        $Miconexion = MiConexion();
        $Correo = $_POST['Correo'];
        $Contraseña = $_POST['Contra'];

        if (isset($_SESSION['usuario']) && isset($_SESSION['Img_perfil']) && isset($_SESSION['Rol'])) {
            unset($_SESSION['usuario']); //Ya hay una sesion iniciada
            unset($_SESSION['Img_perfil']);// Ya hay una sesion iniciada
            unset($_SESSION['Rol']); //Ya hay una sesion iniciada
        }

        if (isset($_SESSION['mostrar'])){
            unset($_SESSION['mostrar']);
        }

        // Validar que el correo y contraseña no estén vacíos
        if (empty($Correo) || empty($Contraseña)) {
            header("Location: IniciaSesion.php");
            $_SESSION['mensaje'] = '4'; //campos vacios
            exit();
        }
        // Validar que el correo sea válido
        if (!filter_var($Correo, FILTER_VALIDATE_EMAIL)) {
            header("Location: IniciaSesion.php");
            $_SESSION['mensaje'] = '5'; //Correo invalido
            exit();
        }

        if(isset($_SESSION['visualizarPersonal'])){
            unset($_SESSION['visualizarPersonal']);
        }
        if(isset($_SESSION['visualizarCrearRoles'])){
            unset($_SESSION['visualizarCrearRoles']);
        }
        if(isset($_SESSION['visualizarModificarPermisos'])){
            unset($_SESSION['visualizarModificarPermisos']);
        }
        if(isset($_SESSION['visualizarMenuAdministracion'])){
            unset($_SESSION['visualizarMenuAdministracion']);
        }

        $sql = "SELECT E.id_empleado, R.rol_nombre, R.id_rol, R.Crear_Roles, R.Modificar_permisos, R.Menu_administracion, E.Nombre, E.Edad, E.Correo, E.Contrasena, E.Telefono, E.Imagen_perfil FROM empleados E INNER JOIN rol R ON E.id_rol = R.id_rol WHERE Correo = '".$Correo."'";
        $sentencia = $Miconexion->prepare($sql);
        $sentencia->execute();
        $usuario = $sentencia->fetchAll();
        if ($usuario) {
            foreach($usuario as $fila){
                if ($fila['id_rol'] === 1){
                    $_SESSION['visualizarPersonal'] = true;
                }
        
                if ($fila['Crear_Roles'] === 'SI'){ //Verifica si tiene este permiso activado
                    $_SESSION['visualizarCrearRoles'] = true;
                }

                if ($fila['Modificar_permisos'] === 'SI'){ //Verifica si tiene este permiso activado
                    $_SESSION['visualizarModificarPermisos'] = true;
                }

                if ($fila['Menu_administracion'] === 'SI'){
                    $_SESSION['visualizarMenuAdministracion'] = true;
                }

                if ($fila['Contrasena'] === $Contraseña){
                    $_SESSION['usuario'] = $fila['Nombre'];
                    $_SESSION['Img_perfil'] = $fila['Imagen_perfil'];
                    $_SESSION['Rol'] = $fila['rol_nombre'];
                    $_SESSION['Id_usuario'] = $fila['id_empleado'];
                    $_SESSION['mensaje'] = '1'; //Inicio sesion correctamente
                    header("Location: IniciaSesion.php");
                }
                else {
                    $_SESSION['mensaje'] = '2'; //Contraseña incorrecta
                    header("Location: IniciaSesion.php");
                }
            }
        } else {
            header("Location: IniciaSesion.php");
            $_SESSION['mensaje'] = '3'; //Correo no registrado
            $_SESSION['CorreoError'] = $Correo;
        }
    }
    catch(PDOException $e) {
        echo "Error: ". $e->getMessage();
    }
    exit();
?>