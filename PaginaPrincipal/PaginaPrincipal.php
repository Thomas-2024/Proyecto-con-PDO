<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/PagPrincipal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="estilos/tabla_empleados.css">
    <script src="ocultar.php"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Interfaz</title>
</head>
<body>
<script src="../code/actualizar.js"></script>
    <?php session_start(); 
        if(isset($_SESSION['editado'])){
            unset($_SESSION['editado']); 
        }
    ?>
    <div class="navegador_lateral">
            <button class="boton_dropdown" id="menu1">
                <i class="fa-solid fa-user"></i>
                <span>Cuenta</span>
                <i class="fa-solid fa-chevron-right"></i>
            </button>
            <div class="contenido_dropdown" id="menu1">
                    <form action="" method="post">
                        <a href="CerrarSesion.php">Cerrar sesion</a>
                        <a href="#">Actualizar datos</a>
                        <?php if(isset($_SESSION['visualizarCrearRoles'])){
                            $visualizarCrearRoles = $_SESSION['visualizarCrearRoles'];
                            if($visualizarCrearRoles){?>
                            <input type="submit" name="crea_rol" value="Crear_rol"><br>
                        <?php }}
                             if(isset($_SESSION['visualizarModificarPermisos'])){
                            $visualizarModificarPermisos = $_SESSION['visualizarModificarPermisos'];
                            if($visualizarModificarPermisos){?>
                            <input type="submit" name="modificar_permisos" value="Modificar_Permisos"><br>
                        <?php }}
                            if(isset($_SESSION['visualizarMenuAdministracion'])){
                            $visualizarMenuAdministracion = $_SESSION['visualizarMenuAdministracion'];
                            if($visualizarMenuAdministracion){?>
                            <input type="submit" name="menu_administracion" value="Menu_Administracion"><br>
                        <?php }}?>
                    </form>
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
                        </form>
                    </div>
                    <?php
                }}
            ?>
    </div>
    <div class="header_contenido">
        <header>
            <div class="logo_contenedor">
                <img src="../ImagenesImportantes/Logo de la empresa.png" alt="IUA" class="imagenes">
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
                else if (isset($_POST['Editar'])){
                    $_SESSION['mostrar'] = 'Editar';
                    $IDD = $_POST['Editar'];
                }
                if(isset($_SESSION["mostrar"])){
                    switch ($_SESSION['mostrar']) {
                        case 'Gestionar Empleados':
                                include "SeleccionarRegistros.php";
                            break;

                        case 'Modificar_Permisos':
                                include "Secciones-con-permisos/PermisosForm.php";
                            break;
                        case 'Crear_rol':
                                include "Secciones-con-permisos/CrearNewRol.php";
                            break;
                        case 'Menu_Administracion':
                            echo "No hay nada a mostrar aun";
                            break;
                        case 'Editar':
                                include "ActualizarRegistros.php";
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
    <script src="../code/PaginaPrincipal.js"></script>
</body>
</html>
