<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Listado</title>
    <?php require 'database_conection.php' ?>
</head>
<body>
    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = $_POST["titulo"];

        $sql = $conexion -> prepare("SELECT * FROM videojuegos WHERE titulo = ?");
        $sql -> bind_param("s", $titulo);
        $sql -> execute();
        $resultado = $sql -> get_result();
        $conexion -> close();
    }       
    ?>
    <div class="container">
        <h1>Listado de videojuegos</h1>
        <form action="search_videogame.php" method="post">
            <div class="row mb-3">
                <div class="col-4">
                    <input class="form-control" type="text" name="titulo">
                </div>
                <div class="col-2">
                    <input class="btn btn-primary" type="submit" value="Buscar">
                </div>
            </div>
        </form>

        <table class="table table-striped table-hover">
            <header>
                <tr>
                    <th>Título</th>
                    <th>Distribuidora</th>
                    <th>Precio</th>
                </tr>
            </header>
            <tbody>
                <?php
                while($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila["titulo"] . "</td>";
                    echo "<td>" . $fila["distribuidora"] . "</td>";
                    echo "<td>" . $fila["precio"] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>