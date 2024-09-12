<?php
    function showEstados() {
        $lista_estados = "";
        include_once "Conexion.php";
        $Mienlace=MiConexion();
        $estados = $Mienlace->prepare("SELECT * FROM categoria");
        $estados->execute();
        $matrizEstados = $estados->fetchAll();
        foreach($matrizEstados as $filaEstado){
            $lista_estados .= "<option value='".$filaEstado["id_estado"]."'>".$filaEstado["Estado"]."</option>";
        }
        return $lista_estados;
    }
?>