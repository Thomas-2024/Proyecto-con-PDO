<?php
    function showRols() {
        $lista_roles = "";
        include_once "Conexion.php";
        $Mienlace=MiConexion();
        if(isset($_SESSION['visualizarModificarPermisos'])){
            $roles = $Mienlace->prepare("SELECT * FROM rol WHERE id_rol != 1");
        } else {
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