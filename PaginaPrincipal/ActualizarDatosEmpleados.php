<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
include_once "../Uso_multiple/Conexion.php";
$Mienlace=MiConexion();
include "../Uso_multiple/CapturarDatosEmpleados.php";
$id_modificar = $_GET['id_modificar'];
$sentencia_update =$Mienlace->prepare("UPDATE empleados SET id_empleado=:id_empleado, id_rol=:id_rol, Nombre=:Nombre, Edad=:Edad, Correo=:Correo, Contrasena=:Contrasena, Telefono=:Telefono, Imagen_perfil=:Img_perfil WHERE id_empleado=".$id_modificar);
$sentencia_update->execute(array(
    ':id_empleado'=>$Id,
    ':id_rol'=>$Rol,
    ':Nombre'=>$Nombre,
    ':Edad'=>$Edad,
    ':Correo'=>$Correo,
    ':Contrasena'=>$Contraseña,
    ':Telefono'=>$Telefono,
    ':Img_perfil'=>$dir_img_perfil,
));
if(isset($_SESSION['visualizarPersonal'])){
    $_SESSION['mostrar'] = 'Gestionar Empleados';
}else {
    $_SESSION['mostrar'] = '';
}
echo "<script>
    document.body.onload = function(){    
        Swal.fire({
        title: 'Se actualizo correctamente',
        text: 'Seras redirigido al menu principal',
        icon: 'success',
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'Interfaz.php';
        }
        });
    }
    </script>";
?>