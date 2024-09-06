<?php
    function showProveedores() {
        $lista_proveedores = "";
        include_once "Conexion.php";
        $Mienlace=MiConexion();
        $proveedores = $Mienlace->prepare("SELECT * FROM empresa");
        $proveedores->execute();
        $matrizProveedores = $proveedores->fetchAll();
        foreach($matrizProveedores as $filaProveedores){
            $lista_proveedores .= "<option value='".$filaProveedores["id_empresa_proveedora"]."'>".$filaProveedores["empresa_proveedora"]."</option>";
        }
        return $lista_proveedores;
    }
?>