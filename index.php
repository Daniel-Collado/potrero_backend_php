<?php
//CONEXIÓN A BASE DE DATOS (servidor:puerto, usuario, password, esquema de base de datos)

$conexion = mysqli_connect("127.0.0.1: 3306", "root", "", "proyecto_integrador_pd");

if ($conexion === false) {
    echo "hubo un error de conexión a la base de datos";
    echo "<br>";
} else {
    echo "Se conectó correctamnte a la base de datos";
    echo "<br>";
}

$query = "INSERT INTO productos (nombre_producto, precio_producto, stock_producto) VALUES ('Set Terrazo', '9000', '1')";
$resultado = mysqli_query($conexion, $query);

if ($resultado === false) {
    echo "No se pudo ejecutar la query";
    echo "<br>";
} else {
    echo "Se ejecutó la query";
    echo "<br>";
}

//$query = "SELECT * FROM productos /*WHERE precio_producto > 8000";

$resultado = mysqli_query($conexion, $query);

while ($unaFila = mysqli_fetch_assoc($resultado)) {
    echo $unaFila["nombre_producto"];
    echo "<br>";
    echo $unaFila["precio_producto"];
    echo "<br>";
}



//DESCONEXIÓN
mysqli_close($conexion);
