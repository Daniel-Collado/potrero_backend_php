<?php
// Conectar a la base de datos
$conexion = mysqli_connect("127.0.0.1:3306", "root", "", "proyecto_integrador_pd");
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}


var_dump($_POST);


// Verificar si se ha enviado el ID del producto a editar
if (isset($_POST["id_producto"])) {
    $id_producto = $_POST["id_producto"];

    // Consultar la información del producto en la base de datos
    $query = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
    $resultado = mysqli_query($conexion, $query);
    $producto = mysqli_fetch_assoc($resultado);
}

if (isset($producto)) {
    // Verificar si se ha enviado el formulario para actualizar el producto
    if (isset($_POST["actualizar"])) {
        $nombre_producto = $_POST["nombre_producto"];
        $precio_producto = $_POST["precio_producto"];
        $stock_producto = $_POST["stock_producto"];

        // Verificar si se ha seleccionado una imagen



        if (isset($_FILES["imagen_producto"])) {
            if (empty($_FILES["imagen_producto"]["name"])) {
                $query = "UPDATE productos SET nombre_producto = '$nombre_producto', precio_producto = '$precio_producto', stock_producto = '$stock_producto' WHERE id_producto = '" . $producto["id_producto"] . "'";
                $resultado = mysqli_query($conexion, $query);
            } else {
                $imagen_producto = $_FILES["imagen_producto"];
                $type = pathinfo($imagen_producto["name"], PATHINFO_EXTENSION);
                $data = file_get_contents($imagen_producto["tmp_name"]);
                $imagen_base64 = "data:image/" . $type . ";base64," . base64_encode($data);
                // Actualizar la información del producto en la base de datos
                $query = "UPDATE productos SET nombre_producto = '$nombre_producto', precio_producto = '$precio_producto', stock_producto = '$stock_producto', imagen_producto = '$imagen_base64' WHERE id_producto = '" . $producto["id_producto"] . "'";
                $resultado = mysqli_query($conexion, $query);
            }
        }


        try {
            $resultado = mysqli_query($conexion, $query);
            if ($resultado) {
                header("Location: productos.php");
                exit;
            } else {
                echo "Error al actualizar el producto: " . mysqli_error($conexion);
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

//DESCONEXIÓN
mysqli_close($conexion);
exit;
