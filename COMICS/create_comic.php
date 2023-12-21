<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Comic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require 'database_conection.php' ?>
</head>
<body>
    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = $_POST["titulo_comic"];
        $paginas = (int)$_POST["paginas"];
        $genero = $_POST["genero"];

        $sql = $conexion -> prepare("INSERT INTO comics(titulo_comic, paginas, genero) VALUES (?,?,?)");
        $sql -> bind_param("sis",$titulo, $paginas, $genero);
        $sql -> execute();
        $conexion -> close();
    }
    ?>
    <div class="container">
        <h1>Nuevo Comic</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" type="text" name="titulo_comic">
            </div>
            <div class="mb-3">
                <label class="form-label">Páginas</label>
                <input class="form-control" type="number" step="1" name="paginas">
            </div>
            <div class="mb-3">
                <label class="form-label">Género</label>
                <select class="form-select" name="genero">
                    <option value="Acción">Acción</option>
                    <option value="Aventuras">Aventuras</option>
                    <option value="Romance">Romance</option>
                    <option value="Comedia">Comedia</option>
                </select>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
            </div>
        </form>
        <a href="index.php"><input class="btn btn-primary" type="submit" value="INICIO"></a>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>