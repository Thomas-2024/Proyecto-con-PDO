<?php
    if(isset($_SESSION['mensaje_categoria'])){
        unset($_SESSION['mensaje_categoria']);
    }
    if(isset($_SESSION['mensaje_proveedor'])){
        unset($_SESSION['mensaje_proveedor']);
    }
    //se van a capturar los datos de id del lote, producto, categoria, estado, cantidad, unidad de medida, fecha de elaboracion, fecha de expiracion, proveedor y ubicacion
    function capturar($ext, $allow, $error, $size, $tmp, $name, $categoria_producto) {
        $Img_producto_Dest = "";
        if (empty($Img_producto)){
            if (!empty($_POST['Img_productoOld'])){
                $Img_producto_Dest = $_POST['Img_productoOld'];
            }
        }
        if (in_array($ext, $allow)) {
            if ($error === 0) {//
                if(file_exists('../imagenesdeproductos/'.$categoria_producto)){
                    $Img_producto_Dest = '../imagenesdeproductos/'.$categoria_producto.'/ '.$name;
                    move_uploaded_file($tmp, $Img_producto_Dest);
                } else {
                    mkdir('../imagenesdeproductos/'.$categoria_producto, 0777, true);
                    $Img_producto_Dest = '../imagenesdeproductos/'.$categoria_producto.'/ '.$name;
                    move_uploaded_file($tmp, $Img_producto_Dest);
                }
            } else {
                echo "Hubo un error al subir la imagen";
            }
        } else {
            echo "Solo puedes subir archivos de tipo (jpg, jpeg, png y pdf)";
        }    
        return $Img_producto_Dest;
    }
    $Id_Lote = $_POST['Id_Lote'];
    $opcion_producto = $_POST['opcion_producto'];
    if($opcion_producto == "nuevo"){
        $nombre_producto = $_POST['Producto'];
        $precio = $_POST['Precio'];
        $id_unidad_de_medida = $_POST['Unidad_de_medida'];
        $opcion_categoria = $_POST['opcion_categoria'];

        if($opcion_categoria == "nuevo"){
            $nombre_categoria = $_POST['Categoria'];
            $abreviatura_categoria = $_POST['Abreviatura_Categoria'];
            $insertar_categoria = $conexion->prepare("INSERT INTO categoria (categoria, abreviatura) VALUES(:categoria, :abreviatura)");
            $insertar_categoria->execute(array(":categoria"=>$nombre_categoria, ":abreviatura"=>$abreviatura_categoria));

            $buscar_ultima_categoria = $conexion->prepare("SELECT * FROM categoria ORDER BY id_categoria DESC LIMIT 1");
            $buscar_ultima_categoria->execute();
            $ultima_categoria = $buscar_ultima_categoria->fetch(PDO::FETCH_ASSOC);
            $id_categoria = $ultima_categoria['id_categoria'];
            $_SESSION['mensaje_categoria'] = "Se agrego una nueva categoria llamada: <b>".$nombre_categoria."</b>";
        }else {
            $id_categoria = $_POST['Categoria'];
            $buscar_categoria = $conexion->prepare("SELECT * FROM categoria WHERE id_categoria = :id_categoria");
            $buscar_categoria->execute(array('id_categoria' => $id_categoria));
            $categoria = $buscar_categoria->fetch(PDO::FETCH_ASSOC);
            $abreviatura_categoria = $categoria['abreviatura'];
            $nombre_categoria = $categoria['categoria'];
        }
        //subir imagen del producto en la carpeta correspondiente
        $Img_producto = $_FILES['Img_producto'];
        $Img_producto_Name = $_FILES['Img_producto']['name'];
        $Img_producto_TmpName = $_FILES['Img_producto']['tmp_name'];
        $Img_producto_Size = $_FILES['Img_producto']['size'];
        $Img_producto_Error = $_FILES['Img_producto']['error'];
        $Img_producto_Type = $_FILES['Img_producto']['type'];
    
        $Img_producto_Ext = explode('.', $Img_producto_Name);//explode es una funcion que divide un string en varios strings: en este caso divide el nombre de la imagen en un array de strings si la imagen se llama image.jpg entonces el array quedaria asi: [image, jpg]
        for ($i=0; $i < count($Img_producto_Ext); $i++) { 
            echo $Img_producto_Ext[$i]."<br>";
        }
        $Img_producto_Actual_Ext = strtolower(end($Img_producto_Ext));
    
        $allowed = array("jpg", "jpeg", "png", "pdf", "webp");
        $dir_img_producto = capturar($Img_producto_Actual_Ext, $allowed, $Img_producto_Error, $Img_producto_Size, $Img_producto_TmpName, $Img_producto_Name, $nombre_categoria);
        

        // Obtener el último ID del producto de la misma categoría
        $buscar_ultima_id = $conexion->prepare("SELECT MAX(id_producto) AS max_id FROM inventario WHERE id_producto LIKE :prefix");
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

        //Insertar el nuevo producto en la tabla producto
        $insertar_producto = $conexion->prepare("INSERT INTO producto (id_producto, nombre_producto, precio, id_unidad_de_medida, id_categoria, Imagen) VALUES (:id_producto, :nombre_producto, :precio, :id_unidad_de_medida, :id_categoria, :Imagen)");
        $insertar_producto->execute(array(
            ':id_producto' => $id_producto,
            ':nombre_producto' => $nombre_producto,
            ':precio' => $precio,
            ':id_unidad_de_medida' => $id_unidad_de_medida,
            ':id_categoria' => $id_categoria,
            ':Imagen' => $dir_img_producto
        ));
        
    }else{
        $id_producto = $_POST['Producto'];
        $buscar_datos_producto = $conexion->prepare("SELECT * FROM producto WHERE id_producto = :id_producto");
        $buscar_datos_producto->execute(['id_producto' => $id_producto]);
        $datos_producto = $buscar_datos_producto->fetch(PDO::FETCH_ASSOC);
        $nombre_producto = $datos_producto['nombre_producto'];
        $precio = $datos_producto['precio'];
        $id_unidad_de_medida = $datos_producto['id_unidad_de_medida'];
        $id_categoria = $datos_producto['id_categoria'];
    }
    $id_estado = $_POST['Estado'];
    $cantidad = $_POST['Cantidad'];
    $Fecha_Elaboracion = $_POST['Fecha_Elaboracion'];
    $Fecha_Expiracion = $_POST['Fecha_Expiracion'];
    $opcion_proveedor = $_POST['opcion_proveedor'];
    if($opcion_proveedor == "nuevo"){
        $proveedor = $_POST['Proveedor'];
        $insertar_proveedor = $conexion->prepare("INSERT INTO empresa_proveedora (empresa_proveedora) VALUES(:proveedor)");
        $insertar_proveedor->execute(array(":proveedor"=>$proveedor));
        $_SESSION['mensaje_proveedor'] = "Se agrego una nueva empresa proveedora llamada: <b>".$proveedor."</b>";

        $buscar_ultimo_proveedor = $conexion->prepare("SELECT * FROM empresa_proveedora ORDER BY id_empresa_proveedora DESC LIMIT 1");
        $buscar_ultimo_proveedor->execute();
        $ultimo_proveedor = $buscar_ultimo_proveedor->fetch(PDO::FETCH_ASSOC);
        $id_proveedor = $ultimo_proveedor['id_empresa_proveedora'];
    }else {
        $id_proveedor = $_POST['Proveedor'];
    }
    $id_ubicacion = $_POST['Ubicacion'];
?>