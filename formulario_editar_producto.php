<!-- Formulario para editar el producto -->
<?php var_dump($_POST);
$conexion = mysqli_connect("127.0.0.1:3306", "root", "", "proyecto_integrador_pd");




// Consultar la información del producto en la base de datos
$query = "SELECT * FROM productos WHERE id_producto = '" . $_GET["id"] . "'";

$resultado = mysqli_query($conexion, $query);
$producto = mysqli_fetch_assoc($resultado);






//DESCONEXIÓN
mysqli_close($conexion);
?>

<form action="editar_producto.php" method="post" enctype="multipart/form-data">

    <label for="id_producto"></label>
    <input type="hidden" id="id_producto" name="id_producto" value="<?php echo isset($producto) ? $producto["id_producto"] : ''; ?>">

    <label for="nombre_producto">Nombre del producto:</label>
    <input type="text" id="nombre_producto" name="nombre_producto" value="<?php echo isset($producto) ? $producto["nombre_producto"] : ''; ?>">



    <label for="precio_producto">Precio del producto:</label>
    <input type="number" id="precio_producto" name="precio_producto" value="<?php echo isset($producto) ? $producto["precio_producto"] : ''; ?>">

    <label for="stock_producto">Stock del producto:</label>
    <input type="number" id="stock_producto" name="stock_producto" value="<?php echo isset($producto) ? $producto["stock_producto"] : ''; ?>">

    <label for="imagen_producto">Imagen del producto:</label>
    <input type="file" id="imagen_producto" name="imagen_producto">
    <img src="<?php echo isset($producto) ? $producto["imagen_producto"] : ''; ?>">

    

    <input type="submit" name="actualizar" value="Actualizar">
    <button><a href="./productos.php">Volver</a></button>

</form>

<?php
