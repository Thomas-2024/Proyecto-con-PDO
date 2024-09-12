<?php
    function showUbicacionesDisponibles() {
        $lista_ubicacionesdisponibles = "";
        include_once "Conexion.php";
        $Mienlace=MiConexion();
        $ubicacionesdisponibles = $Mienlace->prepare("SELECT * FROM categoria");
        $ubicacionesdisponibles->execute();
        $matrizUbicacionesDisponibles = $ubicacionesdisponibles->fetchAll();
        foreach($matrizUbicacionesDisponibles as $filaUbicacionDisponible){
            $lista_estados .= "<option value='".$filaUbicacionDisponible["id_ubicacion"]."'>".$filaUbicacionDisponible["Estado"]."</option>";
        }
        return $lista_ubicacionesdisponibles;
    }
?>