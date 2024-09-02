<form action="ModificarPermisos.php" method="post">
        ¿Que rol deseas modificar? <br>
        <select name="RolAModificar" id="RolAModificar" required>
            <option value="">...</option>
            <?php
                require_once "../../Uso_multiple/MostrarRoles.php";
                $lista_roles = showRols();
                printf($lista_roles);
            ?>
        </select> <br><br>
        Crear Roles:
        <input type="checkbox" name="Permiso_Crear_Roles" id="Permiso_Crear_Roles"> <br><br>
        Añadir/Quitar permisos:
        <input type="checkbox" name="Permiso_Modif_Permisos" id="Permiso_Modif_Permisos"> <br><br>
        Ver menu admin:
        <input type="checkbox" name="Permiso_Menu_Admin" id="Permiso_Menu_Admin"> <br><br>
        <input type="submit" value="Modificar rol"> <br>
</form>
<br> <br>
<?php
    include 'Tabla-de-Roles.php';
?>
<br>
<a href="../PaginaPrincipal.php"> <--Regresar al inicio</a>