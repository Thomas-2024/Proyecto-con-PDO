<?php
    try {
        //Obtener los nombres de los roles
        include '../conectar/conexion.php';
        $sql = "SELECT * FROM roles_permisos WHERE id!=2";
        $Select = $Miconexion->query($sql);
        while ($fila = $Select->fetch(PDO::FETCH_ASSOC)) {
            $Roles[$fila['id']] = $fila['Rol']; //Crea un array para facilitar una futura consulta, no es esencial para que funcione
            echo '<option value="'.$fila['Rol'].'">'.$fila['Rol'].'</option>'; //Aqui al momento de almacenar el rol en la db lo haga con el nombre en lugar del id
            /*echo '<option value="'.$fila['id'].'">'.$fila['Rol'].'</option>';*/ //Este no se usa pero al momento de almacenar el rol en la db lo hara con el id
        }
        $Miconexion = null;
    }
    catch (PDOException $e) {
        echo "Error: ". $e->getMessage();
    }
?>