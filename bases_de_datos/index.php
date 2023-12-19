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
        $columna = $_POST["columna"];
        $orden = $_POST["orden"];

        $sql = $conexion -> prepare("SELECT * FROM videojuegos
            WHERE titulo LIKE CONCAT('%',?,'%')
            ORDER BY $columna $orden");
        $sql -> bind_param("s", $titulo);
        $sql -> execute();
        $resultado = $sql -> get_result();
        $conexion -> close();
    }

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $sql = $conexion -> prepare("SELECT * FROM videojuegos");
        $sql -> execute();
        $resultado = $sql -> get_result();
        $conexion -> close();
    }
    ?>
    <div class="container">
        <h1>Listado de videojuegos</h1>
        <form action="" method="post">
            <div class="row mb-3">
                <div class="col-4">
                    <input class="form-control" type="text" name="titulo">
                </div>
                <div class="col-2">
                    <input class="btn btn-primary" type="submit" value="Buscar">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-1">
                    <label class="form-label">Filtrar</label>
                </div>
                <div class="col-2">
                    <select class="form-select" name="columna">
                        <option selected value="titulo">Titulo</option>
                        <option value="distribuidora">Distribuidora</option>
                        <option value="precio">Precio</option>
                    </select>
                </div>
                <div class="col-2">
                    <select class="form-select" name="orden">
                        <option selected value="asc">Ascendente</option>
                        <option value="desc">Descendente</option>
                    </select>
                </div>
            </div>
        </form>

        <table class="table table-striped">
            <header>
                <tr>
                    <th>Título</th>
                    <th>Distribuidora</th>
                    <th>Precio</th>
                    <th></th>
                    <th></th>
                </tr>
            </header>
            <tbody>
                <?php
                while($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila["titulo"] . "</td>";
                    echo "<td>" . $fila["distribuidora"] . "</td>";
                    echo "<td>" . $fila["precio"] . "</td>";
                    echo "<td>"; ?>
                    <form action="view_videogame.php" method="get">
                        <input type="hidden" name="titulo" value="<?php echo $fila["titulo"] ?>">
                        <input class="btn btn-secondary" type="submit" value="Ver">
                    </form>
                    <?php
                    echo "</td><td>";
                    ?>
                    <form action="delete_videogame.php" method="POST">
                        <input type="hidden" name="titulo" value="<?php echo $fila["titulo"]; ?>">
                        <input class="btn btn-danger" type="submit" value="Eliminar">
                    </form>
                    <?php
                    echo "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>