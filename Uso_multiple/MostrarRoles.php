<?php
session_start();
    function showRols() {
        $lista_roles = "";
        include_once "Conexion.php";
        $Mienlace=MiConexion();
        if($_SESSION['mostrar'] == "Gestionar Empleados"){
            $roles = $Mienlace->prepare("SELECT * FROM rol WHERE id_rol != 1");
        } else if(isset($_SESSION['Id_usuario'])){
            $roles = $Mienlace->prepare("SELECT * FROM rol");
        }else{
            $roles = $Mienlace->prepare("SELECT * FROM rol");
        }
        $roles->execute();
        $matrizRoles = $roles->fetchAll();
        foreach($matrizRoles as $filaRol){
            $lista_roles .= "<option value='".$filaRol["id_rol"]."'>".$filaRol["rol_nombre"]."</option>";
        }
        return $lista_roles;
    }
?>