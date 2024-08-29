<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="estilos/editar.css">
    <script src="ocultar.php"></script>
    <title>Document</title>
    
</head>
<body>
<script src="../code/actualizar.js"></script>
<script>
    if(<?php echo $_GET['confirmar']?>){
        Swal.fire({
                    title: "Se actualizo correctamente",
                    text: "¿Deseas volver al menu principal?",
                    icon: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si",
                    cancelButtonText: "No",
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "PaginaPrincipal.php";
                } else {
                    Swal.fire({
                        title: "Mira a ver si tienes que modificar otra cosa",
                        text: "",
                        icon: "info"
                    }).then(function (response){
                        if (response.isConfirmed) {
                            window.location.href = "ActualizarRegistros.php?id_empleado="+<?php echo "'".$_GET['id_empleado']."'"?>;
                        } 
                    });
                    }
                });
    }
</script>
<?php
    include_once "../Uso_multiple/Conexion.php";
    $Mienlace=MiConexion();
    $id_modificar = $_GET['id_empleado'];
    $sentencia_select_modificar=$Mienlace->prepare('SELECT E.id_empleado, R.rol_nombre, R.id_rol, E.Nombre, E.Edad, E.Correo, E.Contrasena, E.Telefono, E.Imagen_perfil FROM empleados E INNER JOIN rol R ON E.id_rol = R.id_rol WHERE id_empleado = :campo');
    $sentencia_select_modificar->execute(array(':campo' => $id_modificar));
    $result2 = $sentencia_select_modificar->fetchALL();

    require_once "../Uso_multiple/MostrarRoles.php";
    $lista_roles = showRols();

    foreach ($result2 as $fila):
    ?>
    <br><br<br><br><br><br><br><br>
    
    <div class="tabla_modificar">
    <br><h2>Editar Informacion </h2>
        <form method="post" action='' enctype="multipart/form-data" name='registro<?php echo $fila['id_empleado']?>' class="formulario">
            Identificacion: <input type="text" name='Id' id="Id" value='<?php echo $fila['id_empleado']?>'><br>
            Nombre: <input type='text' name='Nombre' value='<?php echo $fila['Nombre']?>'><br>
            <input type='text' name='oldRol' value='<?php echo $fila['rol_nombre']?>' disabled style='display: none'>
            Rol: <select name='Rol' id="Rol" class='<?php echo $fila['id_rol']?>'><?php printf($lista_roles) ?></select><br>
            Edad: <input type='text' name='Edad' value='<?php echo $fila['Edad']?>'><br>
            Correo: <input type='text' name='Correo' value='<?php echo $fila['Correo']?>'><br>
            Contraseña: <input type='password' name='Contraseña' id="Contra" value='<?php echo $fila['Contrasena']?>'>
            <a onclick="ocultarContra()" id="Ver"><i class="fas fa-eye"></i></a>
            <a onclick="ocultarContra()" id="Ocultar"><i class="fas fa-eye-slash"></i></a><br>
            Telefono: <input type='text' name='Telefono' value='<?php echo $fila['Telefono']?>'><br>
            Imagen de perfil: <img src="<?php echo $fila['Imagen_perfil']?>" width='100px'>
            <input type='file' name='Img_perfil'>
            <input id="tex" type='text' name='Img_perfilOld' value='<?php echo $fila['Imagen_perfil']?>' style='display: none;'><br><BR>
            <input type="submit" name="modificar" value="Actualizar">
        </form>
        </div>
        <script src="code/contraseña.js"></script>
    <?php
    endforeach;
    if (isset($_POST['modificar'])){
        include "../Uso_multiple/CapturarDatos.php";
        $sentencia_update =$Mienlace->prepare('UPDATE empleados SET id_rol=:id_rol, Nombre=:Nombre, Edad=:Edad, Correo=:Correo, Contrasena=:Contrasena, Telefono=:Telefono, Imagen_perfil=:Img_perfil WHERE id_empleado=:Id');
        $sentencia_update->execute(array(
            ':id_rol'=>$Rol,
            ':Nombre'=>$Nombre,
            ':Edad'=>$Edad,
            ':Correo'=>$Correo,
            ':Contrasena'=>$Contraseña,
            ':Telefono'=>$Telefono,
            ':Img_perfil'=>$dir_img_perfil,
            ':Id'=>$_POST['Id']
        ));
        ?>
        <script>
            window.location.href = "ActualizarRegistros.php?id_empleado="+<?php echo "'".$_POST['Id']."'"?>+"&confirmar=true";
        </script>
        <?php
    }
?>
</body>
</html>
