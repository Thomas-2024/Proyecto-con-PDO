<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="RegistrarLotesSalidas.php" method="post">
        <input type='hidden' name='id_lote' value="<?php echo $_POST['id_lote']?>">
        Unidades a retirar: 
        <input type="text" name="cantidad_retiradas" id="cantidad_retiradas" required>
        <input type="submit" value="Retirar">
    </form>
</body>
</html>