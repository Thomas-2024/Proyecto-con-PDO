<?php
    try {
        include '../conectar/conexion.php';
        $Select = $Miconexion->prepare('SELECT * FROM cuentas');
        $Select->execute();
        
        if ($Select->rowCount() == 0){
            echo "No hay cuentas registradas.";
        } else {
            echo "Se encontraron ". $Select->rowCount(). " cuenta(s) registradas.";
        }
        include_once 'Mensajes.php'; //se encarga de mostrar las alertas
    } catch (PDOException $e){
        echo "Error: ". $e->getMessage();
    }
    $Miconexion = null; //cerrar la conexión con la base de datos
?>