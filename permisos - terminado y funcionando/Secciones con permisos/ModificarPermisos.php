<?php

    $Rol_Modificar = $_POST['RolAModificar'];
    if (isset($_POST['Permiso_Crear_Roles'])){ //Verifica si la casilla esta activada, para colocar el permiso
        if ($_POST['Permiso_Crear_Roles']=== 'on'){
            $Permiso_CrearRoles = "SI";
        }
    } else {
        $Permiso_CrearRoles = "NO"; //Si la casilla esta desactivada el permiso se desactiva para ese rol
    }

    if (isset($_POST['Permiso_Modif_Permisos'])){ //Verifica si la casilla esta activada, para colocar el permiso
        if ($_POST['Permiso_Modif_Permisos']=== 'on'){
            $Permiso_Modificar_Permisos = "SI";
        }
    } else {
        $Permiso_Modificar_Permisos = "NO"; //Si la casilla esta desactivada el permiso se desactiva para ese rol
    }

    if (isset($_POST['Permiso_Productos'])){
        if ($_POST['Permiso_Productos']=== 'on'){
            $Permiso_Productos = "SI";
        }
    } else {
        $Permiso_Productos = "NO";
    }

    if (isset($_POST['Permiso_Menu_Admin'])){
        if ($_POST['Permiso_Menu_Admin']=== 'on'){
            $Permiso_Menu_Admin = "SI";
        }
    } else {
        $Permiso_Menu_Admin = "NO";
    }

    include '../conectar/conexion.php';
    $Update = $Miconexion->prepare("UPDATE roles_permisos SET Crear_Roles = '$Permiso_CrearRoles', Modificar_Permisos = '$Permiso_Modificar_Permisos', Modificar_Productos = '$Permiso_Productos', Menu_Administracion = '$Permiso_Menu_Admin' WHERE Rol = '$Rol_Modificar'");
    $Update->execute();
    header("Location: PermisosForm.php");
    $Miconexion = null;
?>