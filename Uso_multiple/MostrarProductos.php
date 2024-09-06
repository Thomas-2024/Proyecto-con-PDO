<?php
    function showProductos() {
        $lista_productos = "";
        include_once "Conexion.php";
        $Mienlace=MiConexion();
        $productos = $Mienlace->prepare("SELECT * FROM inventario");
        $productos->execute();
        $matrizProductos = $productos->fetchAll();
        foreach($matrizProductos as $filaProducto){
            $lista_productos .= "<option value='".$filaProducto["id_producto"]."'>".$filaProducto["Nombre"]."</option>";
        }
        return $lista_productos;
    }
?>