<link rel="stylesheet" type="text/css" href="estilos/tablarol.css">
<?php
    include_once '../Uso_multiple/Conexion.php';
    $Miconexion=MiConexion();
    $Select = $Miconexion->prepare("SELECT * FROM rol WHERE id_rol!=1");
    $Select->execute();
    echo "<table border='1' id='roles'>";
    echo "<tr>";
    echo "<th class='la'>ID</th>";
    echo "<th class='la'>Rol</th>";
    echo "<th class='la'>Crear Roles</th>";
    echo "<th class='la'>Modificar Permisos</th>";
    echo "<th class='la'>Menu Administracion</th>";
    echo "</tr>";
    while($Fila = $Select->fetch(PDO::FETCH_ASSOC)) {
        
        echo "<tr class='le'></tr>";
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