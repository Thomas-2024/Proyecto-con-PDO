<h2>Retirar <?php echo $_POST['unidad_medida'] ?> del producto <?php echo $_POST['nombre_producto'] ?></h2>
<form action="RegistrarLotesSalidas.php" method="post">
    <input type='hidden' name='id_lote' value="<?php echo $_POST['id_lote']?>">
    Unidades a retirar: 
    <input type="text" name="cantidad_retiradas" id="cantidad_retiradas" required>
    <input type="submit" value="Retirar">
</form>