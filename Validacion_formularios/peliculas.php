<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require '../Funciones/conexion_peliculas.php' ?>
</head>
<body>
    <?php
    function depurar($entrada) {
        $salida = htmlspecialchars($entrada);
        $salida = trim($salida);
        return $salida;
    }
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_id = depurar($_POST["id"]);
        $temp_titulo = depurar($_POST["titulo"]);
        $temp_fecha_estreno = depurar($_POST["fecha_estreno"]);
        if(isset($_POST["edad_recomendada"])) {
            $temp_edad_recomendada = depurar($_POST["edad_recomendada"]);
            echo "<p>edad $temp_edad_recomendada</p>";
        } else {
            $temp_edad_recomendada = "";
        }

        //$_FILES["nombreCampo"]["queQueremosCoger"] -> TYPE, NAME, SIZE
        $nombre_imagen = $_FILES["imagen"]["name"];
        $tipo_imagen = $_FILES["imagen"]["type"];
        $tamano_imagen = $_FILES["imagen"]["size"];
        $ruta_temporal = $_FILES["imagen"]["tmp_name"];
        //echo $nombre_imagen . " " . $tipo_imagen . " " . $tamano_imagen . " " . $ruta_temporal;

        $ruta_final = "imagenes/" . $nombre_imagen;

        move_uploaded_file($ruta_temporal, $ruta_final);

        //Validación del ID
        if(strlen($temp_id) == 0) {
            $err_id = "El ID de la película es obligatorio";
        } else {
            if(filter_var($temp_id, FILTER_VALIDATE_INT) === FALSE) {
                $err_id = "El ID debe ser un número entero";
            } else {
                if(strlen($temp_id) > 8) {
                    $err_id = "El ID no puede ser superior a 8 caracteres";
                } else {
                    $temp_id = (int)$temp_id;
                    if($temp_id < 0) {
                        $err_id = "El ID no puede ser negativo";
                    } else {
                        $id = $temp_id;
                    }
                }
            }
        }

        //Validación del título
        if(strlen($temp_titulo) == 0) {
            $err_titulo = "El título de la película es obligatorio";
        } else {
            if(strlen($temp_titulo) > 80) {
                $err_titulo = "El título no puede tener más de 80 caracteres";
            } else {
                $titulo = $temp_titulo;
            }
        }

        //Validación de la fecha de estreno
        if(strlen($temp_fecha_estreno) == 0) {
            $err_fecha_estreno = "La fecha de estreno es obligatoria";
        } else {
            list($anyo, $mes, $dia) = explode('-', $temp_fecha_estreno);
            if($anyo<1895) {
                $err_fecha_estreno = "La fecha no puede ser anterior a 1895";
            } else {
                $fecha_estreno = $temp_fecha_estreno;
            }
        }

        //Validación de la edad
        if(strlen($temp_edad_recomendada) == 0) {
            $err_edad = "La edad recomendada es obligatoria";
        } else {
            $edades_recomendadas = ["0", "3", "7", "12", "16", "18"];
            if(!in_array($temp_edad_recomendada, $edades_recomendadas)) {
                $err_edad = "La edad recomendada no es válida";
            } else {
                $edad_recomendada = $temp_edad_recomendada;
            }
        }
/*
        echo "<p>$id</p>";
        echo "<p>$titulo</p>";
        echo "<p>$fecha_estreno</p>";
        echo "<p>$edad_recomendada</p>";
*/
        if(isset($id) && isset($titulo) && isset($fecha_estreno) && isset($edad_recomendada)) {
            echo "<h1>Éxito</h1>";
            echo "<p>$edad_recomendada</p>";
            $sql = "INSERT INTO peliculas
                    VALUES ($id,
                            '$titulo',
                            '$fecha_estreno',
                            '$edad_recomendada',
                            '$ruta_final')";

        $conexion -> query($sql);
        }
    }
    
    ?>

<div class="container">
    <h1>Insertar película</h1>
    <div class="col-9">
        <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="mb-3">
                <label class="form-label">ID Película: </label>
                <input class="form-control" type="number" name="id">
                <?php if(isset($err_id)) echo $err_id ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Título: </label>
                    <input class="form-control" type="text" name="titulo">
                    <?php if(isset($err_titulo)) echo $err_titulo ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha de estreno: </label>
                    <input class="form-control" type="date" name="fecha_estreno">
                    <?php if(isset($err_fecha_estreno)) echo $err_fecha_estreno ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Edad recomendada: </label>
                    <select class="form-select" name="edad_recomendada">
                        <option disabled selected hidden>-- Elige una edad --</option>
                        <option value="0">Todos los públicos</option>
                        <option value="3">Mayores de 3 años</option>
                        <option value="7">Mayores de 7 años</option>
                        <option value="12">Mayores de 12 años</option>
                        <option value="16">Mayores de 16 años</option>
                        <option value="18">Mayores de 18 años</option>
                    </select>
                    <?php if(isset($err_edad)) echo $err_edad ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Imagen</label>
                    <input class="form-control" type="file" name="imagen">
                </div>
                <button class="btn btn-primary" type="submit">Enviar</button>
            </fieldset>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>