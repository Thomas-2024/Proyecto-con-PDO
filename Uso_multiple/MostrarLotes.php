<?php
    function showLotes() {
        $lista_lotes = "";
        include_once "Conexion.php";
        $Mienlace=MiConexion();
        $lotes = $Mienlace->prepare("SELECT * FROM lote");
        $lotes->execute();
        $matrizLotes = $lotes->fetchAll();
        foreach($matrizLotes as $filaLote){
            $lista_lotes .= "<option value='".$filaLote["id_lote"]."'>".$filaLote["id_lote"]."</option>";
        }
        return $lista_lotes;
    }
?>