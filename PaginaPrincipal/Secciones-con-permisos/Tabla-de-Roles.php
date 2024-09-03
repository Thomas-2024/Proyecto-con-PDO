<?php
    include_once '../Uso_multiple/Conexion.php';
    $Miconexion=MiConexion();
    $Select = $Miconexion->prepare("SELECT * FROM rol WHERE id_rol!='1000'");
    $Select->execute();
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Rol</th>";
    echo "<th>Crear Roles</th>";
    echo "<th>Modificar Permisos</th>";
    echo "<th>Menu Administracion</th>";
    echo "</tr>";
    while($Fila = $Select->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>".$Fila['id_rol']."</td>";
        echo "<td>".$Fila['rol_nombre']."</td>";
        echo "<td>".$Fila['Crear_Roles']."</td>";
        echo "<td>".$Fila['Modificar_permisos']."</td>";
        echo "<td>".$Fila['Menu_administracion']."</td>";
        echo "</tr>";
    }
    echo "</table>";
    $Miconexion = null;
?>