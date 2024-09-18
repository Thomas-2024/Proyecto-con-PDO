<?php
    include_once "../Uso_multiple/Conexion.php";    
    $conexion=MiConexion();
    $producto_lotes = $_POST['id_producto'];
    $sentencia_lotes =$conexion->prepare("SELECT * FROM lote WHERE id_producto = :id_producto");
    $sentencia_lotes->execute(
        array(':id_producto' => $producto_lotes
        )
    );
?>
<h2>Lotes de <?php echo $_POST['nombre_producto'] ?></h2>
<table border='1' cellspacing='1' cellpadding='1'>
    <tbody>
        <tr>
            <td>&nbsp;ID del lote&nbsp;</td>
            <td>&nbsp;Estado&nbsp;</td>
            <td>&nbsp;Cantidad de Productos&nbsp;</td>
            <td>&nbsp;Unidad de medida&nbsp;</td>
            <td>&nbsp;Fecha Elaboracion&nbsp;</td>
            <td>&nbsp;Fecha Expiracion&nbsp;</td>
            <td>&nbsp;Proveedor&nbsp;</td>
            <td>&nbsp;Ubicacion&nbsp;</td>
            <td colspan='3'>&nbsp;Accion&nbsp;</td>
        </tr>
    <?php
    $resultado=$sentencia_lotes->fetchAll();
    foreach ($resultado as $lotes):
    ?>
        <tr>
            <td><?php echo $lotes['id_lote']?></td>
            <td><?php echo $lotes['id_estado']?></td>
            <td><?php echo $lotes['cantidad_productos']?></td>
            <td><?php echo $lotes['id_unidad_de_medida']?></td>
            <td><?php echo $lotes['Fecha_Elaboracion']?></td>
            <td><?php echo $lotes['Fecha_Expiracion']?></td>
            <td><?php echo $lotes['id_proveedor']?></td>
            <td><?php echo $lotes['id_ubicacion']?></td>
            <td><form action="" method="post">
                <input type='hidden' name='id_lote' value="<?php echo $lotes['id_lote']?>">
                <input type='submit' name='registrar_lotes_salida' value="Registrar Salidas">
            </form></td>
            <td><a href='editarLote.php?id_lote=<?php echo $lotes['id_lote']?>&id_producto=<?php echo $lotes['id_producto']?>'>Editar</a></td>
            <td><a href='eliminarLote.php?id_lote=<?php echo $lotes['id_lote']?>&id_producto=<?php echo $lotes['id_producto']?>'>Eliminar</a></td>
        </tr>
    <?php 
        endforeach;
    ?>
    </tbody>
</table>
