<link rel="stylesheet" href="estilos/RegistrarLote.css">

<form action="" method="post">
    <label for="Id_Lote">Identifiacion del lote: </label>
    <input type="text" name="Id_Lote" id="Id_Lote">
    <label for="Producto">Producto: </label>
    Nuevo: <input type="radio" name="opcion_producto" id="" value="nuevo" onchange="MostrarNuevo('producto')">
    Existente <input type="radio" name="opcion_producto" id="" value="existente" onchange="MostrarExistente('producto')">
    <input type="text" name="nuevo_producto" id="">
    <select name="existente_producto" id="">
        <?php
            require_once "../Uso_multiple/MostrarProductos.php";
            $lista_productos = showProductos();
            printf($lista_productos);
       ?>
    </select>
    <label for="Categoria">Categoria: </label>
    Nuevo: <input type="radio" name="opcion_categoria" id="" value="nuevo" onchange="MostrarNuevo('categoria')">
    Existente <input type="radio" name="opcion_categoria" id="" value="existente" onchange="MostrarExistente('categoria')">
    <input type="text" name="nuevo_categoria" id="Categoria">
    <select name="existente_categoria" id="">
        <?php
            require_once "../Uso_multiple/MostrarCategorias.php";
            $lista_categorias = showCategorias();
            printf($lista_categorias);
       ?>
    </select>
    <label for="Estado">Estado: </label>
    <input type="text" name="Estado" id="Estado">
    <label for="Cantidad">Cantidad: </label>
    <input type="text" name="Cantidad" id="Cantidad">
    <select name="Unidad_de_medida" id="">
        <?php
            require_once "../Uso_multiple/MostrarUnidades_de_medida.php";
            $lista_unidades_de_medida = showUnidades_de_medida();
            printf($lista_unidades_de_medida);
       ?>
    </select>
    <label for="Fecha_Elaboracion">Fecha de elaboracion: </label>
    <input type="text" name="Fecha_Elaboracion" id="Fecha_Elaboracion">
    <label for="Fecha_Expiracion">Fecha de expiracion: </label>
    <input type="text" name="Fecha_Expiracion" id="Fecha_Expiracion">
    <label for="Proveedor">Empresa proveedora: </label>
    Nuevo: <input type="radio" name="opcion_proveedor" id="" value="nuevo" onchange="MostrarNuevo('proveedor')">
    Existente <input type="radio" name="opcion_proveedor" id="" value="existente" onchange="MostrarExistente('proveedor')">
    <input type="text" name="nuevo_proveedor" id="Proveedor">
    <select name="existente_proveedor" id="">
        <?php
            require_once "../Uso_multiple/MostrarProveedores.php";
            $lista_proveedores = showProveedores();
            printf($lista_proveedores);
       ?>
    </select>
    <label for="Ubicacion">Ubicacion: </label>
    <input type="text" name="Ubicacion" id="Ubicacion">
    <input type="submit" value="Registrar Lote">
</form>
<script>
    function MostrarNuevo(opcion){
        opciones = document.getElementsByName("opcion_"+opcion);
        for (let i = 0; i < array.length; i++) {
            if(opciones[i].checked && opciones[i].value  == "nuevo"){
                document.getElementById("nuevo_"+opcion).style.display="block";
                document.getElementById("nuevo_"+opcion).disabled = false;
                document.getElementById("existente_"+opcion).style.display="none";
                document.getElementById("existente_"+opcion).disabled = true;
            }else if (opciones[i].checked && opciones[i].value  == "existente"){
                document.getElementById("existente_"+opcion).style.display="block";
                document.getElementById("nuevo_"+opcion).disabled = true;
                document.getElementById("nuevo_"+opcion).style.display="none";
                document.getElementById("existente_"+opcion).disabled = false;
            }
        }
    }

    function MostrarExistente(opcion){
        opciones = document.getElementsByName(opcion);
    }
</script>
<?php
//Logica de registro de lotes y añadicion a las tablas respectivas de categorias y inventario
//en caso de productos nuevos


?>