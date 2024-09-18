<?php
    session_start();
    include_once "../Uso_multiple/Conexion.php";    
    $Miconexion=MiConexion();
    $id_lote = $_POST['id_lote'];
    echo $id_lote;
    $cantidad_retiradas = $_POST['cantidad_retiradas'];
    echo $cantidad_retiradas;   
    //No aceptar valores negativos
    if($cantidad_retiradas < 0) {
        header('Location: Interfaz.php');
        exit();
    }
    $Select_lote = $Miconexion->prepare("SELECT L.id_producto, L.cantidad_productos, P.id_producto, P.nombre_producto FROM lote L INNER JOIN producto P ON L.id_producto = P.id_producto WHERE id_lote = :id_lote");
    $Select_lote->execute(array(":id_lote" => $id_lote));
    $Fila_lote = $Select_lote->fetch(PDO::FETCH_ASSOC);
    $id_producto = $Fila_lote['id_producto'];
    $nombre_producto = $Fila_lote['nombre_producto'];
    $cantidad_lote = $Fila_lote['cantidad_productos'];
    $cantidad_lote -= $cantidad_retiradas;
    //No permitir retirar más unidades de las que hay
    if($cantidad_lote < 0) {
        header('Location: Interfaz.php');
        //imprimir un swall alert que indique que la cantidad que se quiere sacar es mayor que la canitdad que exite en el lote
        exit();
    }
    $Update_lote = $Miconexion->prepare("UPDATE lote SET cantidad_productos = :cantidad_lote WHERE id_lote = :id_lote");
    $Update_lote->execute(array(":cantidad_lote" => $cantidad_lote, ":id_lote" => $id_lote));

    //actualizar inventario
    $Select_inventario = $Miconexion->prepare("SELECT * FROM inventario WHERE id_producto = :id_producto");
    $Select_inventario->execute(array(":id_producto" => $id_producto));
    $Fila_inventario = $Select_inventario->fetch(PDO::FETCH_ASSOC);
    $cantidad_inventario = $Fila_inventario['Stock'];
    $cantidad_inventario -= $cantidad_retiradas;

    $Update_inventario = $Miconexion->prepare("UPDATE inventario SET Stock = :cantidad_inventario WHERE id_producto = :id_producto");
    $Update_inventario->execute(array(":cantidad_inventario" => $cantidad_inventario, ":id_producto" => $id_producto));
    $Miconexion = null;
    $_SESSION['mensaje_producto'] = "Se registraron <b>".$cantidad_retiradas."</b> salidas del producto <b>".$nombre_producto."</b><br> y ahora la cantidad del inventario es de: <b>".$cantidad_inventario."</b>";
    $_SESSION['mostrar'] = "Gestionar Productos";
    header('Location: Interfaz.php'); //volver al formulario
 //volver al formulario
    exit();
?>