
<link rel="stylesheet" href="estilos/RegistrarLote.css">

<form action="RegistrarLote.php" method="post">
    <label for="Id_Lote">Identifiacion del lote: </label>
    <input type="text" name="Id_Lote" id="Id_Lote">
    Producto Nuevo: <input type="radio" name="opcion_producto" id="" value="nuevo" onchange="Mostrar(this.value, 'producto')">
    Producto Existente <input type="radio" name="opcion_producto" id="" value="existente" onchange="Mostrar(this.value, 'producto')">
    <input type="text" name="Producto" disabled style="display: none;" id="nuevo_producto">
    <div id="PrecioContenedor" style="display: none;">
        <label>Precio</label>
        <input type="text" name="Precio" id="Precio" disabled>
    </div>
    <select name="Producto" disabled style="display: none;" id="existente_producto">
        <option value="">Seleccione un producto</option>
        <?php
            require_once "../Uso_multiple/MostrarProductos.php";
            $lista_productos = showProductos();
            printf($lista_productos);
       ?>
    </select>
    <label for="Estado">Estado: </label>
    <select name="Estado" id="estado">
        <option value="">Seleccione un estado</option>
        <?php
            require_once "../Uso_multiple/MostrarEstados.php";
            $lista_estados = showEstados();
            printf($lista_estados);
       ?>
    </select>
    <div id="contenedor_categoria" style="display: none;">
        Categoria Nueva: <input type="radio" name="opcion_categoria" id="" value="nuevo" onchange="Mostrar(this.value, 'categoria')" disabled>
        Categoria Existente <input type="radio" name="opcion_categoria" id="" value="existente" onchange="Mostrar(this.value, 'categoria')" disabled>
        <input type="text" name="Categoria" disabled style="display: none;" id="nuevo_categoria" placeholder="Nombre">
        <input type="text" name="Abreviatura_Categoria" disabled style="display: none;" id="abreviatura_categoria" placeholder="Abreviatura">
        <select name="Categoria" disabled style="display: none;" id="existente_categoria">
            <option value="">Seleccione una categoria</option>
            <?php
                require_once "../Uso_multiple/MostrarCategorias.php";
                $lista_categorias = showCategorias();
                printf($lista_categorias);
        ?>
        </select>
    </div>
    <label for="Cantidad">Cantidad: </label>
    <input type="text" name="Cantidad" id="Cantidad">
    <div id="contenedor_unidad_de_medida" style="display: none;">
        <select name="Unidad_de_medida" id="unidad_de_medida" disabled>
            <option value="">Seleccione una unidad de medida</option>
            <?php
                require_once "../Uso_multiple/MostrarUnidades_de_medida.php";
                $lista_unidades_de_medida = showUnidades_de_medida();
                printf($lista_unidades_de_medida);
        ?>
        </select>
    </div>
    <label for="Fecha_Elaboracion">Fecha de elaboracion: </label>
    <input type="date" name="Fecha_Elaboracion" id="Fecha_Elaboracion">
    <label for="Fecha_Expiracion">Fecha de expiracion: </label>
    <input type="date" name="Fecha_Expiracion" id="Fecha_Expiracion">
    Empresa proveedora Nueva: <input type="radio" name="opcion_proveedor" id="" value="nuevo" onchange="Mostrar(this.value, 'proveedor')">
    Empresa proveedora Existente <input type="radio" name="opcion_proveedor" id="" value="existente" onchange="Mostrar(this.value, 'proveedor')">
    <input type="text" name="Proveedor" disabled style="display: none;" id="nuevo_proveedor">
    <select name="Proveedor" disabled style="display: none;" id="existente_proveedor">
        <option value="">Seleccione un proveedor</option>
        <?php
            require_once "../Uso_multiple/MostrarProveedores.php";
            $lista_proveedores = showProveedores();
            printf($lista_proveedores);
       ?>
    </select>
    <label for="Ubicacion">Ubicacion: </label>
    <select name="Ubicacion" id="ubicacion">
        <option value="">Seleccione una ubicacion</option>
        <?php
            require_once "../Uso_multiple/MostrarUbicacionesDisponibles.php";
            $lista_ubicacionesdisponibles = showUbicacionesDisponibles();
            printf($lista_ubicacionesdisponibles);
       ?>
    </select>
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
            if(opcion == "producto"){
                document.getElementById("PrecioContenedor").style.display="block";
                document.getElementById("Precio").disabled = false;
                document.getElementById("contenedor_categoria").style.display="block";
                document.getElementsByName("opcion_categoria")[0].disabled = false;
                document.getElementsByName("opcion_categoria")[1].disabled = false;
                document.getElementById("contenedor_unidad_de_medida").style.display="block";
                document.getElementById("unidad_de_medida").disabled = false;
            }
            if(opcion == "categoria"){
                document.getElementById("abreviatura_categoria").style.display="block";
                document.getElementById("abreviatura_categoria").disabled = false;
            }
        }else if (valor == "existente"){
            document.getElementById("existente_"+opcion).style.display="block";
            document.getElementById("nuevo_"+opcion).disabled = true;
            document.getElementById("nuevo_"+opcion).style.display="none";
            document.getElementById("existente_"+opcion).disabled = false;
            if(opcion == "producto"){
                document.getElementById("PrecioContenedor").style.display="none";
                document.getElementById("Precio").disabled = true;
                document.getElementById("contenedor_unidad_de_medida").style.display="none";
                document.getElementById("unidad_de_medida").disabled = true;
                document.getElementById("contenedor_categoria").style.display="none";
                document.getElementsByName("opcion_categoria")[0].disabled = true;
                document.getElementsByName("opcion_categoria")[1].disabled = true;
            }
            if(opcion == "categoria"){
                document.getElementById("abreviatura_categoria").style.display="none";
                document.getElementById("abreviatura_categoria").disabled = true;
            }
        }
    }
</script>
