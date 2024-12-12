<!doctype html>
<html lang="es">

<head>
    <title>Tabla Calden</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-4">
                    <h2 class="heading-section">Productos</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href='./formulario_agregar_producto.php'>Agregar Producto</a>

                    <div class="table-wrap">
                        <table class="table table-hover">
                            <thead class="thead-primary">
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>Producto</th>
                                    <th class="precio">Precio</th>
                                    <th class="stock">Stock</th>
                                    <th class="eliminar">Eliminar</th>
                                    <th class="editar">Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $conexion = mysqli_connect("127.0.0.1:3306", "root", "", "proyecto_integrador_pd");
                                $query = "SELECT * FROM productos";
                                $resultado = mysqli_query($conexion, $query);

                                while ($unaFila = mysqli_fetch_assoc($resultado)) {
                                    echo ' <tr class="alert" role="alert">
                                            <td>
                                                <img src="' . $unaFila["imagen_producto"] . '">
                                            </td>
                                            <td>
                                                <div class="email">
                                                    <span><strong>' . $unaFila["nombre_producto"] . '</strong></span>
                                                    <span>Descripción</span>
                                                </div>
                                            </td>
                                            <td>' . $unaFila["precio_producto"] . '</td>
                                            <td>' . $unaFila["stock_producto"] . '</td>
                                            <td>
                                                <a href="eliminar_producto.php?id=' . $unaFila["id_producto"] . '" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                                
                                            </td>
                                            <td>
                                                <a href="formulario_editar_producto.php?id=' . $unaFila["id_producto"] . '" class="edit" data-dismiss="alert" aria-label="Edit">
                                                    <span aria-hidden="true"><i class="fa fa-edit"></i></span>
                                                
                                            </td>
                                                </tr>';
                                }



                                //DESCONEXIÓN
                                mysqli_close($conexion);
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/main-js@0.1.6/index.min.js"></script>

    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"81e64de6db471a92","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
</body>

</html>