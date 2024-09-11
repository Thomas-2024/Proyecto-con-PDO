<link rel="stylesheet" href="estilos/RegistrarLote.css">

<form action="" method="post">
    <label for="Id_Lote">Identifiacion del lote: </label>
    <input type="text" name="Id_Lote" id="Id_Lote">
    <label for="Producto">Producto: </label>
    Nuevo: <input type="radio" name="opcion_producto" id="" value="nuevo" onchange="Mostrar(this.value, 'producto')">
    Existente <input type="radio" name="opcion_producto" id="" value="existente" onchange="Mostrar(this.value, 'producto')">
    <input type="text" name="Producto" disbaled style="display: none;" id="nuevo_producto">
    <select name="Producto" disbaled style="display: none;" id="existente_producto">
        <?php
            require_once "../Uso_multiple/MostrarProductos.php";
            $lista_productos = showProductos();
            printf($lista_productos);
       ?>
    </select>
    <label for="Categoria">Categoria: </label>
    Nuevo: <input type="radio" name="opcion_categoria" id="" value="nuevo" onchange="Mostrar(this.value, 'categoria')">
    Existente <input type="radio" name="opcion_categoria" id="" value="existente" onchange="Mostrar(this.value, 'categoria')">
    <input type="text" name="Categoria" disabled style="display: none;" id="nuevo_categoria">
    <input type="text" name="Abreviatura_Categoria" disabled style="display: none;" id="Abreviatura_Categoria">
    <select name="Categoria" disabled style="display: none;" id="existente_categoria">
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
    Nuevo: <input type="radio" name="opcion_proveedor" id="" value="nuevo" onchange="Mostrar(this.value, 'proveedor')">
    Existente <input type="radio" name="opcion_proveedor" id="" value="existente" onchange="Mostrar(this.value, 'proveedor')">
    <input type="text" name="Proveedor" disabled style="display: none;" id="nuevo_proveedor">
    <select name="Proveedor" disabled style="display: none;" id="existente_proveedor">
        <?php
            require_once "../Uso_multiple/MostrarProveedores.php";
            $lista_proveedores = showProveedores();
            printf($lista_proveedores);
       ?>
    </select>
    <label for="Ubicacion">Ubicacion: </label>
    <input type="text" name="Ubicacion" id="Ubicacion">
    <input type="submit" name="RegistrarLote" value="Registrar Lote">
</form>
<script>
    function Mostrar(valor, opcion){
        console.log(valor);
        if(valor == "nuevo"){
            document.getElementById("nuevo_"+opcion).style.display="block";
            document.getElementById("nuevo_"+opcion).disabled = false;
            document.getElementById("existente_"+opcion).style.display="none";
            document.getElementById("existente_"+opcion).disabled = true;
            if(opcion == "categoria"){
                document.getElementById("abreviatura_categoria").style.display="block";
                document.getElementById("abreviatura_categoria").disabled = false; 
            }else {
                document.getElementById("abreviatura_categoria").style.display="none";
                document.getElementById("abreviatura_categoria").disabled = true; 
            }
        }else if (valor == "existente"){
            document.getElementById("existente_"+opcion).style.display="block";
            document.getElementById("nuevo_"+opcion).disabled = true;
            document.getElementById("nuevo_"+opcion).style.display="none";
            document.getElementById("existente_"+opcion).disabled = false;
        }
    }
</script>
<?php
//Logica de registro de lotes y añadicion a las tablas respectivas de categorias y inventario
//en caso de productos nuevos
    include_once "../Uso_multiple/Conexion.php";    
    $conexion=MiConexion();
    if(isset($_POST['RegistrarLote'])){
        include "../Uso_multiple/CapturarDatosLotes.php";
        $sentencia_registrar =$conexion->prepare("INSERT INTO inventario (id_producto, id_categoria, Precio, Stock, id_unidad_de_medida, Imagen) VALUES (:id_producto, :id_categoria, :Precio, :Stock, :id_unidad_de_medida, :Imagen)");
        $sentencia_registrar->execute(
            array(
                ':id_producto' => $Producto,
                ':id_categoria' => $Categoria,
                ':Precio' => 0,
                ':Stock' => $Cantidad,
                ':id_unidad_de_medida' => $Unidad_de_medida,
                ':Imagen' => "imagenes/imagen.jpg"
            )
        );
    }
?>