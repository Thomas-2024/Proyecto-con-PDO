<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/estilo.css">
    <script src="funciones/lista.js"></script>
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        if (isset($_SESSION['rol_logeo'])){
            $Rol = $_SESSION['rol_logeo'];
        } else {
            $Rol = "Invitado";
            unset($_SESSION['rol_logeo']);
        }

        echo "El rol es: $Rol <br>";
    ?>
    <nav class="Menu">
        <ul id="Menu_Principal">
            <li><a href="pagina.php">Pagina</a></li>
            <li><span class="lista" onclick="MostrarMenu1()">Cuenta <i id="flecha-menu1" class="fa-solid fa-chevron-right"></i></span></li> <!--Menu 1-->
            <ul id="menu1">
                <li><a href="cerrar-sesion.php">Cerrar sesion</a></li>
                <li><a href="cambiar-rol.php">Cambiar rol</a></li>
                <li><a href="cambiar-contrasena.php">Cambiar contraseña</a></li>
            </ul> <!--Fin del menu 1 -->
            <li><a href="#">Mostrar mensaje</a></li>
            <li id="Menu-Admin" style="display: none;"><span class="lista" onclick="MostrarMenu2()">Admin. <i id="flecha-menu2" class="fa-solid fa-chevron-right"></i></span></li> <!--Menu 2-->
            <ul id="menu2">
                <li id="Menu-CrearRol" style="display: none;"><a href="../Secciones con permisos/CrearNewRol.php">Crear rol</a></li>
                <li id="Menu-Permisos-Roles" style="display: none;"><a href="../Secciones con permisos/PermisosForm.php">Modificar permisos</a></li>
                <li id="Menu-Productos" style="display: none;"><a href="#">Modificar productos</a></li>
            </ul> <!--Fin del menu 2 -->
            
        </ul>
        <div id="contenido">
        <!--Contenido de la pagina-->
        <h1>Pagina principal</h1>
        <?php
            if ($Rol == 'Admin'){
                echo "Esta viendo desde una acc de admin <br> <br>";
            } else {
                echo "Esta viendo desde una acc de usuario <br> <br>";
            }
            include '../Permisos/ComprobarPermiso.php';
        ?>
        </div>
    </nav>

</body>
</html>