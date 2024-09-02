<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Estilo.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div id="Registrar-cuenta">
        <form action="registro-cuenta.php" method="post">
            <h2>Crear una nueva cuenta</h2>
            Nombre <br>
            <input type="text" name="Nombre" id="Nombre" autocomplete="off"> <br><br>
            Apellido <br>
            <input type="text" name="Apellido" id="Apellido" autocomplete="off"> <br><br>
            Rol <br>
            <select name="Rol" id="Rol">
                <option value="">...</option>
                <?php
                    include 'ListaRoles_Registrarse.php';
                ?>
            </select> <br><br>
            Correo <br>
            <input type="text" name="CorreoReg" id="CorreoReg" autocomplete="off" placeholder="ejemplo@example.com"> <br><br>
            Contraseña <br>
            <input type="text" name="ContraReg" id="ContraReg" autocomplete="off"> <br> <br>
            ¿Ya tienes cuenta?<a href="index.php" id="IniciarSesion"> Inicia sesion</a><br><br>
            <input type="submit" value="Crear cuenta" id="Crear-cuenta"><br><br>

            <?php
            include 'select.php'; //se encarga de mostrar las alertas y cuantas cuentas hay creadas en la db
            ?>
        </form>
    </div>
    
</body>
</html>