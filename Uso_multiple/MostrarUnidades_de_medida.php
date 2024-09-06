<?php
    function showUnidades_de_medida() {
        $lista_unidades_de_medida = "";
        include_once "Conexion.php";
        $Mienlace=MiConexion();
        $unidades_de_medida = $Mienlace->prepare("SELECT * FROM unidades_de_medida");
        $unidades_de_medida->execute();
        $matrizUnidades_de_medida = $unidades_de_medida->fetchAll();
        foreach($matrizUnidades_de_medida as $filaUnidad_de_medida){
            $lista_unidades_de_medida .= "<option value='".$filaUnidad_de_medida["id_unidad_medida"]."'>".$filaUnidad_de_medida["unidad_medida"]."</option>";
        }
        return $lista_unidades_de_medida;
    }
?>