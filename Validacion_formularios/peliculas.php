<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
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
        $temp_edad_recomendada = depurar($_POST["edad_recomendada"]);

        //Validación del ID
        if(!strlen($temp_id) > 0) {
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
        if(!strlen($temp_titulo) > 0) {
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
        


    }
    
    ?>
    
    <form action="" method="post">
        <fieldset>
            <label>ID Película: </label>
            <input type="number" name="id">
            <?php if(isset($err_id)) echo $err_id ?>
            <br><br>
            <label>Título: </label>
            <input type="text" name="nombre">
            <?php if(isset($err_titulo)) echo $err_titulo ?>
            <br><br>
            <label>Fecha de estreno: </label>
            <input type="date" name="fecha_estreno">
            <?php if(isset($err_fecha_estreno)) echo $err_fecha ?>
            <br><br>
            <label>Edad recomendada: </label>
            <input type="number" name="edad_recomendada">
            <?php if(isset($err_edad)) echo $err_edad ?>
            <br><br>
            <input type="submit" value="Registrar">
        </fieldset>
    </form>
</body>
</html>