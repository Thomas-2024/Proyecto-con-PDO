<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="ModificarPermisos.php" method="post">
        ¿Que rol deseas modificar? <br>
        <select name="RolAModificar" id="RolAModificar" required>
            <option value="">...</option>
            <?php
                include 'Lista-Roles.php';
            ?>
        </select> <br><br>
        Crear Roles:
        <input type="checkbox" name="Permiso_Crear_Roles" id="Permiso_Crear_Roles"> <br><br>
        Añadir/Quitar permisos:
        <input type="checkbox" name="Permiso_Modif_Permisos" id="Permiso_Modif_Permisos"> <br><br>
        Modificar productos:
        <input type="checkbox" name="Permiso_Productos" id="Permiso_Productos"> <br><br>
        Ver menu admin:
        <input type="checkbox" name="Permiso_Menu_Admin" id="Permiso_Menu_Admin"> <br><br>
        <input type="submit" value="Modificar rol"> <br>
    </form>
    <br> <br>
    <?php
        include 'Tabla-de-Roles.php';
    ?>
    <br>
    <a href="../Pagina/pagina.php"> <--Regresar al inicio</a>
</body>
</html>