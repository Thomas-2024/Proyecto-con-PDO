<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/Interfaz.css">
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
        if(isset($_SESSION['Id_usuario'])){
            include_once "../Uso_multiple/Conexion.php";
            $conexion=MiConexion();
            $select = $conexion->prepare("SELECT E.id_empleado, R.rol_nombre, R.id_rol, E.Nombre, E.Edad, E.Correo, E.Contrasena, E.Telefono, E.Imagen_perfil FROM empleados E INNER JOIN rol R ON E.id_rol = R.id_rol WHERE id_empleado = ".$_SESSION['Id_usuario']);
            $select->execute();
            $usuario = $select->fetch(mode: PDO::FETCH_ASSOC);
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
                        <input type="hidden" name="EditarDatosUsuario" value="<?php echo $_SESSION['Id_usuario']; ?>">
                        <input type="submit" name="modificar_datos_usuario" value="Actualizar datos">
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
            <i class="fas fa-box-open"></i>
            <span>Productos</span>
            <i class="fa-solid fa-chevron-right"></i>
        </button>

            <div class="contenido_dropdown">
                <form action="" method="post">
                    <input type="submit" name="gestionar_productos" value="Gestionar Productos">
                    <input type="submit" name="registrar_lotes" value="Registras Entradas de Productos">
                </form>
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
                <p>Eres <?php echo $usuario['rol_nombre'] ?></p>
                <?php 
                    if($usuario['Imagen_perfil'] == 'NULL' or $usuario['Imagen_perfil'] == ''){
                        echo "<img src='"."../ImagenesImportantes/Imagen_de_usuario.png"."' class='imagenes' style='height: 100px'><span style='font-size: 10px'>No tienes foto <br> de perfil</span>";
                    }else {
                        echo "<img src='".$usuario['Imagen_perfil']."' class='imagenes' style='height: 100px'>";
                    }
                ?>
            </div>
        </header>
        <div class="contenido">
            <div class="Bienvenido">
                <div class="capa2">
                    <h1 class="titulo">Bienvenido(a) <?php echo $usuario['Nombre'] ?></h1>
                </div>
            </div>
            <div id="contenido_correspondiente">
            <?php
                if(isset($_POST['empleados'])){
                    $_SESSION['mostrar'] = $_POST['empleados'];
                }else if (isset($_POST['modificar_permisos'])) {
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
                    $_SESSION['editado'] = $_POST['Editar'];
                }
                else if (isset($_POST['gestionar_productos'])){
                    $_SESSION['mostrar'] = 'Gestionar Productos';
                }
                else if (isset($_POST['registrar_lotes'])){
                    $_SESSION['mostrar'] = 'Registrar Entradas';
                }
                else if (isset($_POST['registrar_lotes_salida'])){
                    $_SESSION['mostrar'] = 'Registrar Salidas';
                }
                else if (isset($_POST['gestionar_lotes'])){
                    $_SESSION['mostrar'] = 'Gestionar Lotes';
                }
                else if (isset($_POST['gestionar_'])){
                    $_SESSION['mostrar'] = 'Registrar Salidas';
                }
                else if (isset($_POST['modificar_datos_usuario'])){
                    $_SESSION['mostrar'] = 'Editar';
                    $_SESSION['editado'] = $_POST['EditarDatosUsuario'];
                }
                else if (isset($_POST['EditarLote'])){
                    $_SESSION['mostrar'] = 'EditarLote';
                    $_SESSION['editadoLote'] = $_POST['EditarLote'];
                }
                if(isset($_SESSION["mostrar"])){
                    switch ($_SESSION['mostrar']) {
                        case 'Gestionar Empleados':
                            include "SeleccionarEmpleados.php";
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
                                include "FormularioActualizarEmpleados.php";
                            break;
                        case 'Gestionar Productos':
                                include "GestionarProductos.php";
                            break;
                        case 'Registrar Entradas':
                                include "FormularioRegistrarLotes.php";
                            break;
                        case 'Registrar Salidas':
                            include "FormularioRegistrarLotesSalidas.php";
                            break;
                        case 'Gestionar Lotes':
                            include "GestionarLotes.php";
                            break;
                        case 'EditarLote':
                            include "FormularioActualizarDatosLotes.php";
                            break;
                        default:
                            echo "<script> document.getElementById('contenido_correspondiente').innerHTML = ''</script>";
                }}
            ?>
    </div></div>
    <script src="../code/Interfaz.js"></script>
</body>
</html>
