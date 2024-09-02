<?php
    try {
        include '../conectar/conexion.php';
        $Nombre_Rol = $_POST['New_Rol'];
        // Validar que el nombre del rol no exista en la base de datos
        $sql = "SELECT COUNT(*) FROM roles_permisos WHERE Rol = '$Nombre_Rol'";
        $result = $Miconexion->query($sql);
        $count = $result->fetchColumn();
        if ($count > 0) {
            echo "El nombre del rol ya existe en la base de datos";
            exit();
        }
        $sql = "INSERT INTO roles_permisos (Rol) VALUES ('$Nombre_Rol')";
        $Miconexion->exec($sql);
        header("Location: CrearNewRol.php");
        echo "Rol creado correctamente";
        $Miconexion = null;
    }
    catch(PDOException $e) {
        echo $sql. "<br>". $e->getMessage();
    }
?>