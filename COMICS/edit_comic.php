<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit comic</title>
    <?php require 'database_conection.php' ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $titulo = $_GET["titulo_comic"];

        $sql = $conexion -> prepare("SELECT * FROM comics
            WHERE titulo_comic = ?");
        $sql -> bind_param("s", $titulo);
        $sql -> execute();
        $resultado = $sql -> get_result();

        $fila = $resultado -> fetch_assoc();
        $conexion -> close();

        $paginas = $fila["paginas"];
        $genero = $fila["genero"];
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = $_POST["titulo_comic"];
        $paginas = (int)$_POST["paginas"];
        $genero = $_POST["genero"];
        $titulo_original = $_POST["titulo_original"];

        $sql = $conexion -> prepare("UPDATE comics 
            SET titulo_comic = ?, paginas = ?, genero = ?
            WHERE titulo_comic = ?");
        $sql -> bind_param("siss", $titulo, $paginas, $genero, $titulo_original);
        $sql -> execute();
        header('location: index.php');
    }
    ?>
<div class="container">
    <h1>Nuevo comic</h1>
    <form action="" method="post">
        <input type="hidden" name="titulo_original" value="<?php echo $titulo; ?>">
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input class="form-control" type="text" name="titulo_comic" value="<?php echo $titulo; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Paginas</label>
            <input class="form-control" type="number" step="1" name="paginas" value="<?php echo $paginas ?>">
        </div>
        <div class="mb-3">
                <label class="form-label">Género</label>
                <select class="form-select" name="genero">
                    <option selected value="<?php echo $genero; ?>"><?php echo $genero; ?></option>
                    <option value="Acción">Acción</option>
                    <option value="Aventuras">Aventuras</option>
                    <option value="Romance">Romance</option>
                    <option value="Comedia">Comedia</option>
                </select>
            </div>
        <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="Editar">
            <a href="index.php"><input class="btn btn-primary" type="submit" value="INICIO"></a>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>