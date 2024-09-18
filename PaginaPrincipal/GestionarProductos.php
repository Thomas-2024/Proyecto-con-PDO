<link rel="stylesheet" href="estilos/gestionarproductos.css">
<?php
    if(isset($_SESSION['mensaje_producto'])){
        ?>
        <div class="mensaje_producto">
            <?php if(isset($_SESSION['mensaje_categoria'])){echo "<p>".$_SESSION['mensaje_categoria']."</p>"; unset($_SESSION['mensaje_categoria']);}?>
            <?php echo "<p>".$_SESSION['mensaje_producto']."</p>";?>
            <?php if(isset($_SESSION['mensaje_proveedor'])){echo "<p>".$_SESSION['mensaje_proveedor']."</p>"; unset($_SESSION['mensaje_proveedor']);}?>
        </div>
        <?php
        unset($_SESSION['mensaje_producto']);
    }
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
            $sentencia_productos =$conexion->prepare("SELECT I.id_producto, P.id_producto, P.nombre_producto, P.Precio, I.Stock, U.id_unidad_medida, U.unidad_medida, P.Imagen FROM inventario I INNER JOIN producto P ON I.id_producto = P.id_producto INNER JOIN Unidades_de_medida U ON P.id_unidad_de_medida = U.id_unidad_medida WHERE P.id_categoria = :id_categoria");
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
                <span><?php echo $producto['nombre_producto']?></span>
                <h3>Identificacion:</h3>
                <span><?php echo $producto['id_producto']?></span>
                <h3>Precio</h3>
                <span><?php echo $producto['Precio']?></span>
                <h3>Cantidad de Existencias:</h3>
                <span><?php echo $producto['Stock']." ";?></span><span><?php echo $producto['unidad_medida']?></span>
                <form action="" method="post">
                    <input type="text" name="id_producto" value="<?php echo $producto['id_producto']?>" style="display: none;">
                    <input type="text" name="nombre_producto" value="<?php echo $producto['nombre_producto']?>" style="display: none;">
                    <input type="submit" name="gestionar_lotes" value="Gestionar Lotes del Producto">
                </form>
            </div>
        </div>
        <?php 
            endforeach;
        ?>
    </div>
<?php 
    endforeach;
?>