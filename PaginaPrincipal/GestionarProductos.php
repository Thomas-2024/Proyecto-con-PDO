<link rel="stylesheet" href="estilos/gestionarproductos.css">
<?php 
    include_once "../Uso_multiple/Conexion.php";    
    $conexion=MiConexion();
    $sentencia_categoria =$conexion->prepare("SELECT * from categoria");
    $sentencia_categoria->execute();

    $resultado=$sentencia_categoria->fetchAll();
    foreach ($resultado as $categoria):
?>
    <div class="categoria">
        <h2><?php echo $categoria['categoria'] ?></h2>
        <?php
            // sentencia con el inner join a tablas de unidad de medida
            $sentencia_productos =$conexion->prepare("SELECT I.id_producto, I.Nombre, I.Precio, I.Stock, U.id_unidad_medida, U.unidad_medida, I.Imagen FROM inventario I INNER JOIN Unidades_de_medida U ON I.id_unidad_de_medida = U.id_unidad_medida WHERE I.id_categoria = :id_categoria");
            $sentencia_productos->execute(
                array(':id_categoria' => $categoria['id_categoria']
                )
            );
        
            $resultado=$sentencia_productos->fetchAll();
            foreach ($resultado as $producto):
        ?>
        <div class="producto">
            <img id="imag" src="<?php echo $producto['Imagen']?>">
            <div class="info">
                <h3>Nombre:</h3>
                <span><?php echo $producto['Nombre']?></span>
                <h3>Identificacion:</h3>
                <span><?php echo $producto['id_producto']?></span>
                <h3>Precio</h3>
                <span><?php echo $producto['Precio']?></span>
                <h3>Cantidad de Existencias:</h3>
                <span><?php echo $producto['Stock']." ";?></span><span><?php echo $producto['unidad_medida']?></span>
            </div>
        </div>
        <?php 
            endforeach;
        ?>
    </div>
<?php 
    endforeach;
?>