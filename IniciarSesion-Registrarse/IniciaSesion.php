<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/EstiloFormulario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="ocultar-mostrarContra.php"></script>
</head>
<body>
    <header>
        <div class="logo_contenedor">
        <a href="../Index.html"><img src="../ImagenesImportantes/Logo de la empresa.png" alt="Logo de la compañia" class="logo"></a>
        </div>
        <div class="encabezado">
            <div class="seleccionado">
                <a class="boton" href="" id="login">Iniciar sesion</a>
                <div class="borde_animado"></div>
            </div>
            <div class="botonEncabezado">
                <a class="boton" href="Registrarse.php" >Registrarse</a>
                <div class="borde_animado"></div>
            </div>
        </div>
    </header>  
    <div class="index"  id="Iniciar-sesion">
    <form action="validarSesion.php" method="post">
        <h2>Iniciar sesión</h2>
        Correo <br>
        <input type="text" name="Correo" id="Correo" autocomplete="off" placeholder="ejemplo@example.com"> <br><br>
        Contraseña <br>
        <a onclick="ocultarContra()" id="Ver"><i class="fas fa-eye"></i></a>
        <a onclick="ocultarContra()" id="Ocultar"><i class="fas fa-eye-slash"></i></a>
        <input type="password" name="Contra" id="Contra"><br><br>
        <a href="Registrarse.php" id="CrearCuenta">Crear una cuenta</a><br><br>
        <input type="submit" value="Iniciar sesion" id="Iniciar-se"><br> <br>
    </form>
    </div>
    <?php
        include 'Mensajes.php'; //se encarga de mostrar las alertas y cuantas cuentas hay creadas en la db
        ?>
</body>
</html>