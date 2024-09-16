<?php
    include_once "../Uso_multiple/Conexion.php";
    $Mienlace=MiConexion();

    $sentencia_delete = $Mienlace->prepare("DELETE FROM empleados WHERE id_empleado=:Id");
    $sentencia_delete->execute(array(':Id'=>$_GET['id_empleado']));

    include "EliminarImagen.php";
    eliminarImagen($dir_img_perfil);
    header("Location: Interfaz.php");
    echo "se elimino la imagen del: ".$dir_img_perfil;
?>