<?php
    include '../conectar/conexion.php';
    $Select = $Miconexion->prepare('SELECT * FROM roles_permisos WHERE id!=2');
    $Select->execute();
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Rol</th>";
    echo "<th>Crear Roles</th>";
    echo "<th>Modificar Permisos</th>";
    echo "<th>Modificar Productos</th>";
    echo "<th>Menu Administracion</th>";
    echo "</tr>";
    while($Fila = $Select->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>".$Fila['id']."</td>";
        echo "<td>".$Fila['Rol']."</td>";
        echo "<td>".$Fila['Crear_Roles']."</td>";
        echo "<td>".$Fila['Modificar_Permisos']."</td>";
        echo "<td>".$Fila['Modificar_Productos']."</td>";
        echo "<td>".$Fila['Menu_Administracion']."</td>";
        echo "</tr>";
    }
    echo "</table>";
    $Miconexion = null;
?>