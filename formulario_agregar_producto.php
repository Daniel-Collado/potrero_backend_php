<form action="agregar_producto.php" method="post" enctype="multipart/form-data">
    <label>Nombre:</label><input type="text" id="nombre_producto" name="nombre_producto">
    <br>
    <label>Precio:</label><input type="number" id="precio_producto" name="precio_producto">
    <br>
    <label>Stock:</label><input type="number" id="stock_producto" name="stock_producto">
    <br>
    <label>Imagen:</label><input type="file" id="imagen_producto" name="imagen_producto">
    <br>
    <button>Agregar Producto</button><a href="./productos.php">Volver</a>

</form>