<?php
session_start();
    include_once "../Uso_multiple/Conexion.php";
    $Miconexion=MiConexion();
    $id_Lote = $_POST['id_lote'];
    $Producto_Antiguo = $_POST['Producto_Antiguo'];
    $buscar_datos_producto_antiguo = $Miconexion->prepare("SELECT * FROM producto WHERE id_producto = :id_producto");
    $buscar_datos_producto_antiguo->execute(['id_producto' => $Producto_Antiguo]);
    $datos_producto_antiguo = $buscar_datos_producto_antiguo->fetch(PDO::FETCH_ASSOC);
    $nombre_producto_antiguo = $datos_producto_antiguo['nombre_producto'];
    $cantidad = $_POST['Cantidad'];
    if(isset($_POST['Producto'])){
        $Producto = $_POST['Producto']; //Obtencion de datos del formulario
        $buscar_datos_producto = $Miconexion->prepare("SELECT * FROM producto WHERE id_producto = :id_producto");
        $buscar_datos_producto->execute(['id_producto' => $Producto]);
        $datos_producto = $buscar_datos_producto->fetch(PDO::FETCH_ASSOC);
        $Unidad_Medida = $datos_producto['id_unidad_de_medida'];
        $Categoria = $datos_producto['id_categoria'];
        $nombre_producto = $datos_producto['nombre_producto'];

        $buscar_producto = $Miconexion->prepare("SELECT * FROM inventario WHERE id_producto = :id_producto");
        $buscar_producto->execute(array(":id_producto"=>$Producto));
        $producto = $buscar_producto->fetch(mode: PDO::FETCH_ASSOC);

        $buscar_producto_antiguo = $Miconexion->prepare("SELECT * FROM inventario WHERE id_producto = :id_producto");
        $buscar_producto_antiguo->execute(array(":id_producto"=>$Producto_Antiguo));
        $producto_antiguo = $buscar_producto_antiguo->fetch(mode: PDO::FETCH_ASSOC);
        
        $nueva_cantidad = $producto['Stock']+$cantidad;
        $actualizar_cantiodad = $Miconexion->prepare("UPDATE inventario SET Stock = :cantidad WHERE id_producto = :id_producto");
        $actualizar_cantiodad->execute(array(":cantidad"=>$nueva_cantidad, ":id_producto"=>$Producto));
        
        $nueva_cantidad_antiguo = $producto_antiguo['Stock']-$cantidad;
        $actualizar_cantiodad_antiguo = $Miconexion->prepare("UPDATE inventario SET Stock = :cantidad WHERE id_producto = :id_producto");
        $actualizar_cantiodad_antiguo->execute(array(":cantidad"=>$nueva_cantidad_antiguo, ":id_producto"=>$Producto_Antiguo));
        
        $_SESSION['mensaje_producto'] = "Se registraron <b>".$cantidad."</b> entradas del producto <b>".$nombre_producto."</b><br> y ahora la cantidad del inventario es de: <b>".$nueva_cantidad."</b> y <br>".
        "Se registraron <b>".
        $cantidad."</b> salidas del producto <b>".$nombre_producto_antiguo.
        "</b><br> y ahora la cantidad del inventario es de: <b>".$nueva_cantidad_antiguo."</b>";    
    }
    $Estado = $_POST['Estado'];

    $Fecha_Elaboracion = $_POST['Fecha_Elaboracion'];
    $Fecha_Vencimiento = $_POST['Fecha_Expiracion'];
    $Proveedor = $_POST['Proveedor'];
    $Ubicacion = $_POST['Ubicacion'];

    $Select = $Miconexion->prepare("SELECT L.id_lote, L.id_producto, 
    P.id_producto, P.nombre_producto, L.id_estado, S.id_estado, S.estado, L.id_categoria, 
    C.id_categoria, C.categoria, L.cantidad_productos, L.id_unidad_de_medida, U.id_unidad_medida, U.unidad_medida,
    L.Fecha_Elaboracion, L.Fecha_Expiracion, 
    L.id_proveedor, E.id_empresa_proveedora, E.empresa_proveedora, 
    L.id_ubicacion, T.id_ubicacion, T.Modulo_Estante
    FROM lote L 
    INNER JOIN producto P ON L.id_producto = P.id_producto
    INNER JOIN estado S ON L.id_estado = S.id_estado
    INNER JOIN categoria C ON L.id_categoria = C.id_categoria
    INNER JOIN unidades_de_medida U ON L.id_unidad_de_medida = U.id_unidad_medida 
    INNER JOIN empresa_proveedora E ON L.id_proveedor = E.id_empresa_proveedora
    INNER JOIN ubicacion T ON L.id_ubicacion = T.id_ubicacion WHERE id_lote = :id_lote"); //Consulta los datos que ya estaban puestos antes de hacer el cambio a los nuevos datos
    $Select->execute(array(":id_lote" => $id_Lote));
    $row = $Select->fetch(PDO::FETCH_ASSOC);  //Esto hara que al momento de no llenar un campo en lugar de quedar vacio, se auto completa con los datos que ya estaban, dando lugar a que no surgan cambios y se mantengan los datos
    if(empty($id_Lote)){
        $Id_Lote = $row['id_lote'];
    } 
    if(empty($Producto)){
        $Producto = $row['id_producto'];
    }
    if(empty($Categoria)){
        $Categoria = $row['id_categoria'];
    }
    if(empty($Estado)){
        $Estado = $row['id_estado'];
    }
    if(empty($Unidad_Medida)){
        $Unidad_Medida = $row['id_unidad_medida'];
    }
    if(empty($Fecha_Elaboracion)){
        $Fecha_Elaboracion = $row['Fecha_Elaboracion'];
    }
    if(empty($Fecha_Vencimiento)){
        $Fecha_Vencimiento = $row['Fecha_Expiracion'];
    }
    if(empty($Proveedor)){
        $Proveedor = $row['id_empresa_proveedora'];
    }
    if(empty($Ubicacion)){
        $Ubicacion = $row['id_ubicacion'];
    }

    $sql = "UPDATE lote SET id_lote = '$id_Lote', id_producto = '$Producto', id_categoria = '$Categoria', id_estado = '$Estado', id_unidad_de_medida = '$Unidad_Medida', Fecha_Elaboracion = '$Fecha_Elaboracion', Fecha_Expiracion = '$Fecha_Vencimiento', id_proveedor = '$Proveedor', id_ubicacion = '$Ubicacion' WHERE id_Lote = '$id_Lote'";
    $Miconexion->exec($sql); //Inserta los nuevos datos reemplazando los ya existentes
        $Miconexion = null; 
    $_SESSION['mostrar'] = "Gestionar Productos";
    header("Location: Interfaz.php"); //Retorna al formulario//Cierre de conexion a la db
//Esto hara que al momento de no llenar un campo en lugar de quedar vacio, se auto completa con los datos que ya estaban, dando lugar a que no surgan cambios y se mantengan los datos
?>