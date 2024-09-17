<?php
    try {
        include_once '../../Uso_multiple/Conexion.php';
        $Miconexion=MiConexion();
        $Nombre_Rol = $_POST['New_Rol'];
        // Validar que el nombre del rol no exista en la base de datos
        $sql = "SELECT COUNT(*) FROM rol WHERE rol_nombre = '$Nombre_Rol'";
        $result = $Miconexion->query($sql);
        $count = $result->fetchColumn();
        if ($count > 0) {
            echo "El nombre del rol ya existe en la base de datos";
            exit();
        }
        $sql = "INSERT INTO rol (rol_nombre) VALUES ('$Nombre_Rol')";
        $Miconexion->exec($sql);
        header("Location: ../Interfaz.php");
        echo "Rol creado correctamente";
        $Miconexion = null;
    }
    catch(PDOException $e) {
        echo $sql. "<br>". $e->getMessage();
    }
?>