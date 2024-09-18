<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once "../Uso_multiple/Conexion.php";
    $Miconexion=MiConexion();
    $id_lote = $_SESSION['editadoLote'];
    $sentencia_lote =$Miconexion->prepare("SELECT L.id_lote, L.id_producto, 
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
    INNER JOIN ubicacion T ON L.id_ubicacion = T.id_ubicacion  WHERE id_lote = :id_lote");
    $sentencia_lote->execute(
        array(':id_lote' => $id_lote
    ));
    $lote = $sentencia_lote->fetch(PDO::FETCH_ASSOC);
    ?>
    <form action="ActualizarDatosLotes.php" method="post">
        Id del lote:<br>
        <input type="text" id="id_lote" name="id_lote" value="<?php echo $lote['id_lote'] ?>"> <br>
        Id del producto:<br>
        <input type="text" id="Producto_Antiguo" name="Producto_Antiguo" value="<?php echo $lote['id_producto'] ?>" style="display: none;"> <br>
        <select name="Producto">
        <option value="">Seleccione un producto</option>
        <?php
            require_once "../Uso_multiple/MostrarProductos.php";
            $lista_productos = showProductos();
            printf($lista_productos);
        ?>
        </select><br>
        Estado: <br>
        <select name="Estado" id="estado">
        <option value="">Seleccione un estado</option>
            <?php
                require_once "../Uso_multiple/MostrarEstados.php";
                $lista_estados = showEstados();
                printf($lista_estados);
            ?>
        </select><br>
        
        </select><br>
        <input type="text" id="cantidad" name="Cantidad" value="<?php echo $lote['cantidad_productos'] ?>" style="display: none;"> <br>
        
        Fecha elaboracion: <br>
        <input type="date" id="Fecha_Elaboracion" name="Fecha_Elaboracion" value="<?php echo $lote['Fecha_Elaboracion'] ?>"> <br>
        Fecha expiracion: <br>
        <input type="date" id="Fecha_Expiracion" name="Fecha_Expiracion" value="<?php echo $lote['Fecha_Expiracion'] ?>"> <br>
        Proveedor: <br>
        <select name="Proveedor">
        <option value="">Seleccione un proveedor</option>
            <?php
                require_once "../Uso_multiple/MostrarProveedores.php";
                $lista_proveedores = showProveedores();
                printf($lista_proveedores);
            ?>
        </select><br>
        Ubicacion: <br>
        <select name="Ubicacion">
        <option value="">Seleccione una ubicacion</option>
            <?php
                require_once "../Uso_multiple/MostrarUbicacionesDisponibles.php";
                $lista_ubicacionesdisponibles = showUbicacionesDisponibles();
                printf($lista_ubicacionesdisponibles);
            ?>
        </select><br>
        <input type="submit" value="Actualizar">
    </form>
<br>
    <?php //Esto se puede quitar, solo era para ver si funcionaba
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Producto</th>";
        echo "<th>Estado</th>";
        echo "<th>Categoria</th>";
        echo "<th>Cantidad</th>";
        echo "<th>Medida</th>";
        echo "<th>Elaborado</th>";
        echo "<th>Expira</th>";
        echo "<th>Proveedor</th>";
        echo "<th>Ubicacion</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>".$lote['id_lote']."</td>";
        echo "<td>".$lote['nombre_producto']."</td>";
        echo "<td>".$lote['estado']."</td>";
        echo "<td>".$lote['categoria']."</td>";
        echo "<td>".$lote['cantidad_productos']."</td>";
        echo "<td>".$lote['unidad_medida']."</td>";
        echo "<td>".$lote['Fecha_Elaboracion']."</td>";
        echo "<td>".$lote['Fecha_Expiracion']."</td>";
        echo "<td>".$lote['empresa_proveedora']."</td>";
        echo "<td>".$lote['Modulo_Estante']."</td>";
        echo "</tr>";
        echo "</table>";
        $Miconexion = null; // Cerrar la conexión con la base de datos.
    ?>
    
</body>
</html>