<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/PagPrincipal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="estilos/tabla_empleados.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Interfaz</title>
</head>
<body>

    <?php session_start(); ?>
    <div class="navegador_lateral">
            <button class="boton_dropdown" id="menu1">
                <i class="fa-solid fa-user"></i>
                <span>Cuenta</span>
                <i class="fa-solid fa-chevron-right"></i>
            </button>
            <div class="contenido_dropdown" id="menu1">
                    <a href="CerrarSesion.php">Cerrar sesion</a>
                    <a href="#">Actualizar datos</a>
            </div>
            <button class="boton_dropdown" id="menu1">
                <i class="far fa-calendar-alt"></i>
                <span>Pedidos</span>
                <i class="fa-solid fa-chevron-right"></i>
            </button>
            <div class="contenido_dropdown" id="menu1">
                    <a href="#">Estadisticas</a>
                    <a href="#">Proveedores</a>
            </div>
            <button class="boton_dropdown" id="menu1">
            <i class="fas fa-box-open"></i>
            <span>Productos</span>
            <i class="fa-solid fa-chevron-right"></i>
        </button>

            <div class="contenido_dropdown">
                <a href="#">Registro productos
                </a>
                <a href="#">Tabla</a>
            </div>
            <?php
                if(isset($_SESSION['visualizarPersonal'])){
                    $visualizarPersonal = $_SESSION['visualizarPersonal'];
                    if($visualizarPersonal){
                    ?>
                    <button class="boton_dropdown">
                        <i class="fas fa-id-badge" ></i>
                        <span>Personal</span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                    <div class="contenido_dropdown">
                        <form action="" method="post">
                            <input type="submit" name="empleados" value="Gestionar Empleados">
                            <input type="submit" id="Menu-CrearRol" style="display: none;" name="crea_rol" value="Crear rol">
                            <input type="submit" id="Menu-Permisos-Roles" style="display: none;" name="modificar_permisos" value="Modificar permisos">
                            <input type="submit" id="Menu-Administracion" style="display: none;" name="menu_administracion" value="Menu Administracion">    
                        </form>
                    </div>
                    <?php
                }}
            ?>
    </div>
    <div class="header_contenido">
        <header>
            <div class="logo_contenedor">
                <img src="../../ImagenesImportantes/Logo de la empresa.png" alt="IUA" class="imagenes">
            </div>
            <div class="usuario">
                <p>Eres <?php echo $_SESSION['Rol'] ?></p>
                <?php 
                    if($_SESSION['Img_perfil'] == 'NULL' or $_SESSION['Img_perfil'] == ''){
                        echo "<img src='"."../ImagenesImportantes/Imagen_de_usuario.png"."' class='imagenes'><span style='font-size: 10px'>No tienes foto <br> de perfil</span>";
                    }else {
                        echo "<img src='".$_SESSION['Img_perfil']."' class='imagenes'>";
                    }
                ?>
            </div>
        </header>
        <div class="contenido">
            <div class="Bienvenido">
                <div class="capa2">
                    <h1 class="titulo">Bienvenido(a) <?php echo $_SESSION['usuario'] ?></h1>
                </div>
            </div>
            <div id="contenido_correspondiente">
            <?php
                if(isset($_POST['empleados'])){
                    $_SESSION['mostrar'] = $_POST['empleados'];
                }else if (isset($_POST['modificar_permisos'])){
                    $_SESSION['mostrar'] = $_POST['modificar_permisos'];
                }
                else if (isset($_POST['crea_rol'])){
                    $_SESSION['mostrar'] = $_POST['crea_rol'];
                }
                else if (isset($_POST['menu_administracion'])){
                    $_SESSION['mostrar'] = $_POST['menu_administracion'];
                }
                if(isset($_SESSION["mostrar"])){
                    switch ($_SESSION['mostrar']) {
                        case 'Empleados':
                                include "SeleccionarRegistros.php";
                            break;

                        case 'Modificar permisos':
                                include "ModificarPermisos.php";
                            break;
                        case 'Crear rol':
                                include "CrearRol.php";
                            break;
                        case 'Menu administracion':
                                include "MenuAdministracion.php";
                            break;
                        default:
                                echo "No hay nada a mostrar";
                            break;
                    }
                }
            ?>
            </div>
        </div>
    </div>
    <?php include 'permisos/ComprobarPermiso.php'; ?>
    <script src="../code/PaginaPrincipal.js"></script>
</body>
</html>
