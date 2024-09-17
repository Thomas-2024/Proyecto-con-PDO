
<link rel="stylesheet" type="text/css" href="estilos/editar.css">
<?php
    include_once "../Uso_multiple/Conexion.php";
    $Mienlace=MiConexion();
    if(isset($_SESSION['editado'])){
        $id_modificar = $_SESSION['editado'];
        $sentencia_select_modificar=$Mienlace->prepare("SELECT E.id_empleado, R.rol_nombre, R.id_rol, E.Nombre, E.Edad, E.Correo, E.Contrasena, E.Telefono, E.Imagen_perfil FROM empleados E INNER JOIN rol R ON E.id_rol = R.id_rol WHERE id_empleado = ".$id_modificar);
        $sentencia_select_modificar->execute();
        $result2 = $sentencia_select_modificar->fetchALL();
        require_once "../Uso_multiple/MostrarRoles.php";
        $lista_roles = showRols();

        foreach ($result2 as $fila):
        ?>
        
        <div class="tabla_modificar">
        <br><h2>Editar Informacion </h2>
        <form method="post" action='ActualizarDatosEmpleados.php?id_modificar=<?php echo $id_modificar; ?>' enctype="multipart/form-data" name='modificar' class="formulario">
        Identificacion: <input type='text' name='Id' value='<?php echo $fila['id_empleado']?>'><br>
                Nombre: <input type='text' name='Nombre' value='<?php echo $fila['Nombre']?>'><br>
                <?php if($_SESSION['editado'] != $_SESSION['Id_usuario']){ ?>
                    Rol: <select name='Rol' id="Rol" class='<?php echo $fila['id_rol']?>'><?php printf($lista_roles) ?></select><br>
                <?php }else {?>
                    <select name='Rol' id="Rol" class='<?php echo $fila['id_rol']?>' style="display: none;"><?php printf($lista_roles) ?></select><br>
                <?php }; ?>
                Edad: <input type='text' name='Edad' value='<?php echo $fila['Edad']?>'><br>
                Correo: <input type='text' name='Correo' value='<?php echo $fila['Correo']?>'><br>
                Contraseña: <input type='password' name='Contraseña' id="Contra" value='<?php echo $fila['Contrasena']?>'>
                <a onclick="ocultarContra()" id="Ver"><i class="fas fa-eye"></i></a>
                <a onclick="ocultarContra()" id="Ocultar"><i class="fas fa-eye-slash"></i></a><br>
                Telefono: <input type='text' name='Telefono' value='<?php echo $fila['Telefono']?>'><br>
                Imagen de perfil: <img src="<?php echo $fila['Imagen_perfil']?>" width='100px'>
                <input type='file' name='Img_perfil'>
                <input id="tex" type='text' name='Img_perfilOld' value='<?php echo $fila['Imagen_perfil']?>' style='display: none;'><br>
                <input type="submit" name="modificar" value="Actualizar">
            </form>
            </div>
            <script src="code/contraseña.js"></script>
        <?php
        endforeach;
    }else {
        $_SESSION['mostrar'] = 'Gestionar Empleados';
    }
?>

