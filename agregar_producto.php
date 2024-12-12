<?php

$nombre_producto = $_POST["nombre_producto"];
$precio_producto = $_POST["precio_producto"];
$stock_producto = $_POST["stock_producto"];

$imagen_producto = $_FILES["imagen_producto"];
//var_dump($imagen_producto);

//echo $nombre_producto . " / " . $precio_producto . " / " . $stock_producto . " / " . $imagen_producto;

$type = pathinfo($imagen_producto["name"], PATHINFO_EXTENSION);

$data = file_get_contents($imagen_producto["tmp_name"]);

//echo "$data";

$imagen_base64 = "data:image/" . $type . ";base64," . base64_encode($data);

$conexion = mysqli_connect("127.0.0.1:3306", "root", "", "proyecto_integrador_pd");

$query = "INSERT INTO productos (nombre_producto, precio_producto, stock_producto, imagen_producto) VALUES ('" . $nombre_producto . "', '" . $precio_producto . "', '" . $stock_producto . "', '" . $imagen_base64 . "')";

$resultado = mysqli_query($conexion, $query);

if ($resultado === true) {
    header('Location: productos.php');
} else {
    echo "No se pudo agregar";
    echo "<br>";
}

//DESCONEXIÓN
mysqli_close($conexion);
