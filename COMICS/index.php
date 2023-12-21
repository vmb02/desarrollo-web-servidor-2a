<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require 'database_conection.php' ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $min = $_POST["paginas_min"];
        $max = $_POST["paginas_max"];
        $genero = $_POST["genero"];

        if(strlen($min) > 0) {
            $min = (int)$min;
            $max = (int)$max;
            $sql = $conexion -> prepare("SELECT * FROM comics
                WHERE paginas BETWEEN ? AND ?");
            $sql -> bind_param("ii", $min, $max);
            $sql -> execute();
            $resultado = $sql -> get_result();
        } 
        if($genero != "Todos") {
            $sql = $conexion -> prepare("SELECT * FROM comics
                WHERE genero = ?");
            $sql -> bind_param("s", $genero);
            $sql -> execute();
            $resultado = $sql -> get_result();
        }
        if((strlen($min) > 0) && ($genero != "Todos")) {
            $min = (int)$min;
            $max = (int)$max;
            $sql = $conexion -> prepare("SELECT * FROM comics
            WHERE genero = ? AND paginas BETWEEN ? AND ?");
            $sql -> bind_param("sii", $genero, $min, $max);
            $sql -> execute();
            $resultado = $sql -> get_result();
        } 
        if((strlen($min) <= 0) && ($genero == "Todos")) {
            $sql = $conexion -> prepare("SELECT * FROM comics");
            $sql -> execute();
            $resultado = $sql -> get_result();
            $conexion -> close();
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $sql = $conexion -> prepare("SELECT * FROM comics");
        $sql -> execute();
        $resultado = $sql -> get_result();
        $conexion -> close();
    }    
    ?>
    <div class="container">
        <h1>Listado de Comics</h1>
        <form action="" method="post">
            <div class="row mb-4">
                <div class="col-1">
                    <label class="form-label">Desde</label>
                    <input class="form-control" type="text" step="1" name="paginas_min">
                    <label class="form-label">Hasta</label>
                    <input class="form-control" type="text" step="1" name="paginas_max">
                </div>
                <div class="col-2">
                    <select class="form-select" name="genero">
                        <option selected value="Todos">Todos</option>
                        <option value="Acción">Acción</option>
                        <option value="Aventuras">Aventuras</option>
                        <option value="Romance">Romance</option>
                        <option value="Comedia">Comedia</option>
                    </select>
                </div>
                <div class="col-3">
                    <input class="btn btn-primary" type="submit" value="Buscar">
                </div>
            </div>
        </form>
        <table class="table table-striped">
            <header>
                <tr>
                    <th>Título</th>
                    <th>Páginas</th>
                    <th>Género</th>
                    <th>Vista</th>
                    <th>Eliminar</th>
                </tr>
            </header>
            <tbody>
                <?php
                while($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila["titulo_comic"] . "</td>";
                    echo "<td>" . $fila["paginas"] . "</td>";
                    echo "<td>" . $fila["genero"] . "</td>";
                    echo "<td>"?>
                    <form action="view_comic.php" method="get">
                        <input type="hidden" name="titulo_comic" value="<?php echo $fila["titulo_comic"] ?>">
                        <input class="btn btn-secondary" type="submit" value="Ver">
                    </form>
                    <?php
                    echo "</td><td>"; ?>
                    <form action="delete_comic.php" method="POST">
                        <input type="hidden" name="titulo_comic" value="<?php echo $fila["titulo_comic"]; ?>">
                        <input class="btn btn-danger" type="submit" value="Eliminar">
                    </form>
                    <?php
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="create_comic.php"><input class="btn btn-primary" type="submit" value="Añadir"></a>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>