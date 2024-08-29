<?php
    try {
        //Comprobar que la sesion rol tiene valor
        include_once '../Uso_multiple/Conexion.php';
        $Miconexion=MiConexion();

        if (isset($_SESSION['Rol'])){
            $RolElegido = $_SESSION['Rol'];
        } else {
            echo "No se ha iniciado sesión";
            return; //Salimos de la función para evitar que se ejecuten más líneas de código
        }
        
        $sql = "SELECT * FROM rol WHERE id_rol='$RolElegido'";
        $Resultado = $Miconexion->query($sql);
        $fila = $Resultado->fetch(PDO::FETCH_ASSOC);
        
        if ($fila['Crear_Roles'] === 'SI'){ //Verifica si tiene este permiso activado
            echo "Rol con permisos para crear roles <br>";
            echo "<script>
                document.getElementById('Menu-CrearRol').style.display = 'block'
            </script>";
        } else {
            echo "Rol sin permisos para crear roles <br>";
        }

        if ($fila['Modificar_Permisos'] === 'SI'){ //Verifica si tiene este permiso activado
            echo "Rol con permisos para modificar permisos <br>";
            echo "<script>
                document.getElementById('Menu-Permisos-Roles').style.display = 'block'
            </script>";
        } else {
            echo "Rol sin permisos para modificar permisos <br>";
        }

        if ($fila['Menu_Administracion'] === 'SI'){
            echo "Rol con permisos para ver el menu administrativo <br>";
            echo "<script>
                document.getElementById('Menu-Admin').style.display = 'block'
            </script>";
        } else {
            echo "Rol sin permisos para ver el menu administrativo <br>";
        }

        //      [FORMATO PARA UN PERMISO]
        /*if ($fila['NOMBRE-TABLA'] === 'SI'){ <--  Aqui debe ir el NOMBRE de la columna que contiene si tiene habilitado el permiso o no
            echo "<script>
                document.getElementById('NOMBRE DEL ELEMENTO A MOSTRAR').style.display = 'block'   <-- Aqui debe ir el menu que se debe mostrar en caso de que el permiso este habilitado
            </script>";
        } else {
            echo "Rol sin permisos de... <br>";  <--Aqui opcional si se quiere mostrar algo en caso de que el permiso no esta habilitado
        }*/
        
        //Cerrar la conexión
        $Miconexion = null;
    }
    catch(PDOException $e) {
        echo "Error: ". $e->getMessage();
    }
?>