<?php
    //se van a capturar los datos de id del lote, producto, categoria, estado, cantidad, unidad de medida, fecha de elaboracion, fecha de expiracion, proveedor y ubicacion

    $Id_Lote = $_POST['Id_Lote'];
    $opcion_categoria = $_POST['opcion_categoria'];
    $categoria = $_POST['Categoria'];
    if($opcion_categoria == "nuevo"){
        $abreviatura_categoria = $_POST['Abreviatura_Categoria'];
        $insertar_categoria = $conexion->prepare("INSERT INTO categoria (categoria, abreviatura) VALUES(:categoria, :abreviatura)");
        $insertar_categoria->execute(array(":categoria"=>$categoria, ":abreviatura"=>$abreviatura_categoria));

        $buscar_ultima_categoria = $conexion->prepare("SELECT * FROM categoria ORDER BY id_categoria DESC LIMIT 1");
        $buscar_ultima_categoria->execute();
        $ultima_categoria = $buscar_ultima_categoria->fetch(PDO::FETCH_ASSOC);
        $id_categoria = $ultima_categoria['id_categoria'];
    }else {
        $id_categoria = $_POST['Categoria'];
    }
    $opcion_producto = $_POST['opcion_producto'];
    if($opcion_producto == "nuevo"){
        $precio = $_POST['Precio'];
        // Obtener el último ID del producto de la misma categoría
        $buscar_ultima_id = $conexion->prepare("SELECT MAX(id_producto) AS max_id FROM producto WHERE id_producto LIKE :prefix");
        $buscar_ultima_id->execute(['prefix' => $abreviatura_categoria . '%']);
        $resultado_IDS = $buscar_ultima_id->fetch(PDO::FETCH_ASSOC);
        if ($resultado_IDS && $resultado_IDS['max_id']) {
            // Obtener el máximo ID
            $ultima_id = $resultado_IDS['max_id'];
        
            // Extraer el número del último ID y incrementarlo
            $siguienteNumeroID = intval(substr($ultima_id, 2)) + 1;
        } else {
            // Si no hay ningún ID, comenzar con 1
            $siguienteNumeroID = 1;
        }
        
        // Formatear el nuevo ID
        $id_producto = $abreviatura_categoria.str_pad($siguienteNumeroID, 6, '0', STR_PAD_LEFT);
    }else{
        $id_producto = $_POST['Producto'];
    }
    $producto = $_POST['Producto'];
    $id_estado = $_POST['Estado'];
    $cantidad = $_POST['Cantidad'];
    $id_unidad_de_medida = $_POST['Unidad_de_medida'];
    $Fecha_Elaboracion = $_POST['Fecha_Elaboracion'];
    $Fecha_Expiracion = $_POST['Fecha_Expiracion'];
    $opcion_proveedor = $_POST['opcion_proveedor'];
    if($opcion_proveedor == "nuevo"){
        $insertar_proveedor = $conexion->prepare("INSERT INTO categoria (empresa_proveedora) VALUES(:proveedor)");
        $insertar_proveedor->execute(array(":proveedor"=>$proveedor));

        $buscar_ultimo_proveedor = $conexion->prepare("SELECT * FROM empresa_proveedora ORDER BY id_empresa_proveedora DESC LIMIT 1");
        $buscar_ultimo_proveedor->execute();
        $ultimo_proveedor = $buscar_ultima_proveedor->fetch(PDO::FETCH_ASSOC);
        $id_proveedor = $ultimo_proveedor['id_proveedor'];
    }else {
        $id_proveedor = $_POST['Proveedor'];
    }
    $id_ubicacion = $_POST['Ubicacion'];
?>