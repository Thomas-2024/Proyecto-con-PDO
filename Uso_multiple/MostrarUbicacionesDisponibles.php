<?php
    function showUbicacionesDisponibles() {
        $lista_ubicacionesdisponibles = "";
        include_once "Conexion.php";
        $Mienlace=MiConexion();
        $ubicacionesdisponibles = $Mienlace->prepare("SELECT * FROM ubicacion WHERE id_ubicacion NOT IN (SELECT id_ubicacion FROM lote);");
        $ubicacionesdisponibles->execute();
        $matrizUbicacionesDisponibles = $ubicacionesdisponibles->fetchAll();
        foreach($matrizUbicacionesDisponibles as $filaUbicacionDisponible){
            $lista_ubicacionesdisponibles .= "<option value='".$filaUbicacionDisponible["id_ubicacion"]."'>".$filaUbicacionDisponible["Modulo_Estante"]."</option>";
        }
        return $lista_ubicacionesdisponibles;
    }
?>