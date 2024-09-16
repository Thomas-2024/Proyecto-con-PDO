<?php
session_start();
//Logica de registro de lotes y añadicion a las tablas respectivas de categorias y inventario
//en caso de productos nuevos
    //Verifico si hay una categoria seleccionada
    include_once "../Uso_multiple/Conexion.php";    
    $conexion=MiConexion();
    include_once "../Uso_multiple/CapturarDatosLotes.php";
    //insertar todos los datos en la tabla de lotes
    echo $nombre_producto;
    $sentencia_registrar_lote = $conexion->prepare("INSERT INTO lote VALUES (:id_lote, :id_producto, :id_estado, :id_categoria, :cantidad, :id_unidad_de_medida, :fecha_elaboracion, :fecha_expiracion, :id_proveedor, :id_ubicacion)");
    $sentencia_registrar_lote->execute(
        array(
            ':id_lote' => $Id_Lote,
            ':id_producto' => $id_producto,
            ':id_categoria' => $id_categoria,
            ':id_estado' => $id_estado,
            ':cantidad' => $cantidad,
            ':id_unidad_de_medida' => $id_unidad_de_medida,
            ':fecha_elaboracion' => $Fecha_Elaboracion,
            ':fecha_expiracion' => $Fecha_Expiracion,
            ':id_proveedor' => $id_proveedor,
            ':id_ubicacion' => $id_ubicacion
        )
    );
    $buscar_producto = $conexion->prepare("SELECT * FROM inventario WHERE id_producto = :id_producto");
    $buscar_producto->execute(array(":id_producto"=>$id_producto));
    $producto = $buscar_producto->fetch(mode: PDO::FETCH_ASSOC);

    if($producto){
        $nueva_cantidad = $producto['Stock']+$cantidad;
        $actualizar_cantiodad = $conexion->prepare("UPDATE inventario SET Stock = :cantidad WHERE id_producto = :id_producto");
        $actualizar_cantiodad->execute(array(":cantidad"=>$nueva_cantidad, ":id_producto"=>$id_producto));
    }else {
        $sentencia_registrar =$conexion->prepare("INSERT INTO inventario (id_producto, Stock) VALUES (:id_producto, :Stock)");
        $sentencia_registrar->execute(
            array(
                ':id_producto' => $id_producto,
                ':Stock' => $cantidad,
            )
        );
    }
    $_SESSION['mostrar'] = "Gestionar Productos";
    header("Location: Interfaz.php");
?>