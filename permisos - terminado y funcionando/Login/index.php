<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="ocultar-mostrarContra.php"></script>
</head>
<body>
    <div id="Iniciar-sesion">
    <form action="iniciar-sesion.php" method="post">
        <h2>Iniciar sesión</h2>
        Correo <br>
        <input type="text" name="Correo" id="Correo" autocomplete="off" placeholder="ejemplo@example.com"> <br><br>
        Contraseña
        <input type="checkbox" name="OcultarContra" id="OcultarContra" onclick="ocultarContra()"><br>
        <input type="password" name="Contra" id="Contra"><br><br>
        <a href="registrarse.php" id="CrearCuenta">Crear una cuenta</a><br><br>
        <input type="submit" value="Iniciar sesion" id="Iniciar-se"><br> <br>

        <?php
        include 'select.php'; //se encarga de mostrar las alertas y cuantas cuentas hay creadas en la db
        ?>
    </form>
    </div>
    
</body>
</html>