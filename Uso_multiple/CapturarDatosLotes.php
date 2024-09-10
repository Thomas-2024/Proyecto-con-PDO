<?php
    //se van a capturar los datos de id del lote, producto, categoria, estado, cantidad, unidad de medida, fecha de elaboracion, fecha de expiracion, proveedor y ubicacion

    $Id_Lote = $_POST['Id_Lote'];
    $id_ategoria = $_POST['id_categoria'];
    $opcion_producto = $_POST['opcion_producto'];
    if($opcion_producto == "nuevo"){
    switch ($id_categoria) {
        case '1':
            // Código para manejar la categoría "Alimentos"
            $id_producto = "A".""."";
            // Agrega aquí el código específico para "Alimentos"
            break;
            
        case '2':
            // Código para manejar la categoría "Productos de Limpieza"
            $id_producto = "L".""."";
            // Agrega aquí el código específico para "Productos de Limpieza"
            break;
            
        case '3':
            // Código para manejar la categoría "Utensilios de Cocina"
            $id_producto = "U".""."";
            // Agrega aquí el código específico para "Utensilios de Cocina"
            break;
            
        case '4':
            // Código para manejar la categoría "Electrónicos"
            $id_producto = "E".""."";
            // Agrega aquí el código específico para "Electrónicos"
            break;
            
        case '5':
            // Código para manejar la categoría "Charcutería"
            $id_producto = "C".""."";
            // Agrega aquí el código específico para "Charcutería"
            break;
            
        case '6':
            // Código para manejar la categoría "Seguridad y Protección"
            $id_producto = "S".""."";
            // Agrega aquí el código específico para "Seguridad y Protección"
            break;
            
        case '7':
            // Código para manejar la categoría "Papelería"
            $id_producto = "P".""."";
            // Agrega aquí el código específico para "Papelería"
            break;
            
        case '8':
            // Código para manejar la categoría "Mobiliario"
            $id_producto = "M".""."";
            // Agrega aquí el código específico para "Mobiliario"
            break;
            
        case '9':
            // Código para manejar la categoría "Suplementos y Vitaminas"
            $id_producto = "V".""."";
            // Agrega aquí el código específico para "Suplementos y Vitaminas"
            break;
            
        case '10':
            // Código para manejar la categoría "Productos para Bebés"
            $id_producto = "B".""."";
            // Agrega aquí el código específico para "Productos para Bebés"
            break;
            
        default:
            // Código para manejar cualquier categoría no definida
            echo "Categoría no definida";
            break;
    }
    }else{
        $id_producto = $_POST['Producto'];
    }
    $id_estado = $_POST['id_estado'];
    $Cantidad = $_POST['Cantidad'];
    $id_unidad_de_medida = $_POST['id_unidad_de_medida'];
    $Fecha_Elaboracion = $_POST['Fecha_Elaboracion'];
    $Fecha_Expiracion = $_POST['Fecha_Expiracion'];
    $id_proveedor = $_POST['id_proveedor'];
    $id_ubicacion = $_POST['id_ubicacion'];

?>