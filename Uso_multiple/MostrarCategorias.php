<?php
    function showCategorias() {
        $lista_categorias = "";
        include_once "Conexion.php";
        $Mienlace=MiConexion();
        $categorias = $Mienlace->prepare("SELECT * FROM categoria");
        $categorias->execute();
        $matrizCategorias = $categorias->fetchAll();
        foreach($matrizCategorias as $filaCategoria){
            $lista_categorias .= "<option value='".$filaCategoria["id_categoria"]."'>".$filaCategoria["categoria"]."</option>";
        }
        return $lista_categorias;
    }
?>