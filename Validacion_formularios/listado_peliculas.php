<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de películas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require '../Funciones/conexion_peliculas.php' ?>
</head>
<body>
    <div class="container">
        <h1>Listado de películas</h1>
    </div>
    <div>
        <table class="table table-striped">
            <thead class="table table-dark">
                <tr>
                    <th>ID Película</th>
                    <th>Titulo</th>
                    <th>Fecha Estreno</th>
                    <th>Edad recomendada</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM peliculas";
            $resultado = $conexion -> query($sql);
            while($fila = $resultado -> fetch_assoc()) {
                echo "<tr><td>" . $fila["id_pelicula"] . "</td>
                        <td>" . $fila["titulo"] . "</td>
                        <td>" . $fila["fecha_estreno"] . "</td>
                        <td>" . $fila["edad_recomendada"] . "</td>
                        <td>"; ?>
                        <img width="50" height="100" src="<?php echo $fila["imagen"] ?>">

                        <?php
                        echo "</td>
                        </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>