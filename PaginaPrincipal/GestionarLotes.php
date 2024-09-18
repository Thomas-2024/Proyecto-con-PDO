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
                <input type='text' name='id_lote' value="<?php echo $lotes['id_lote']?>" style="display: none;">
                <input type="text" name="unidad_medida" value="<?php echo $_POST['unidad_medida']?>" style="display: none;">
                <input type="text" name="nombre_producto" value="<?php echo $_POST['nombre_producto']?>" style="display: none;">
                <input type='submit' name='registrar_lotes_salida' value="Registrar Salidas">
            </form></td>
            <td><div onclick="document.getElementById('Editar<?php echo $lotes['id_lote']?>').submit()"><p class='btn__update' style='margin: 0px'>Editar</p><form style='display: none' action='' method='post' id="Editar<?php echo $lotes['id_lote']?>"><input type='text' name='EditarLote' value="<?php echo $lotes['id_lote']?>"></form></div></td>
            <td><div><a href='eliminarLote.php'>Eliminar</a></div></td>
        </tr>
    <?php 
        endforeach;
    ?>
    </tbody>
</table>
