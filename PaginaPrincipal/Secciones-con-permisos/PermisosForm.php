<link rel="stylesheet" href="estilos/formulariopermisos.css">


<form action="Secciones-con-permisos/ModificarPermisos.php" method="post">
    <div class="formupermisos">
        ¿Que rol deseas modificar? <br>
        <select name="RolAModificar" id="RolAModificar" required>
            <option value="">...</option>
            <?php
                require_once "../Uso_multiple/MostrarRoles.php";
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
        <input id="sub" type="submit" value="Modificar rol"> <br>
        </div>
</form>
<br> <br>
<?php
    include 'Tabla-de-Roles.php';
?>
<br>