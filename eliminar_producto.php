<?php

if (isset($_GET["id"])) {
    echo "Archivo eliminado!";
    echo "<br>";
    $id_producto = $_GET["id"];
    if (!empty($id_producto)) {
        echo "Funcionó";
        echo "<br>";
        $conexion = mysqli_connect("127.0.0.1:3306", "root", "", "proyecto_integrador_pd");

        $query = "DELETE FROM productos WHERE id_producto =" . $id_producto;
        $resultado = mysqli_query($conexion, $query);

        mysqli_close($conexion);

        if ($resultado === true) {
            echo "Un lujo! recontra eliminado";
            echo "<br>";
            header('Location: productos.php');
        } else {
            echo "No se pudo eliminar";
            echo "<br>";
        }
    } else {
        echo "No se pudo eliminar";
        echo "<br>";
    };
} else {
    echo "No se pudo eliminar";
    echo "<br>";
};
