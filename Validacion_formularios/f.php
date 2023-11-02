<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <?php
        function depurar($entrar) {
            $salida = htmlspecialchars($entrada);
            $salida = trim($salida);
            return $salida;
        }
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_nombre = depurar($_POST["nombreProducto"]);
        $temp_precio = depurar($_POST["precioProducto"]);
        $temp_descripcion = depurar($_POST["descripcion"]);
        $temp_cantidad = depurar($_POST["cantidad"]);

        //Validación del nombre
        if(strlen($temp_nombre) == 0) {
            $err_nombre = "El nombre es un campo obligatorio";
        } else {
            if(strlen($temp_nombre) > 40) {
                $err_nombre = "El nombre no puede tener más de 40 caracteres";
            } else {
                $patron = "/^[A-Za-z0-9 ]+$/";
                if(!preg_match($patron, $temp_nombre)) {
                    $err_nombre = "El nombre debe estar compuesto por caracteres, números
                    y espacios en blanco.";
                } else {
                    $nombre = $temp_nombre;
                }
            }
        }

        //Validación del precio
        if(strlen($temp_precio) == 0) {
            $err_precio = "El precio es un campo obligatorio";
        } else {
            if(!is_numeric($temp_precio)) {
                $err_precio = "El precio tiene que ser un número."
            } else {
                $temp_precio = (float)$temp_precio;
                if($temp_precio < 0) {
                    $err_precio = "El precio no puede ser negativo";
                } else {
                    if($temp_precio > 99999.99) {
                        $err_precio = "El precio no puede ser superior a 99999.99";
                    } else {
                        $precioProducto = $temp_precio;
                    }
                }
            }
        }

        //Validación de la descripción
        if(strlen($temp_descripcion) == 0) {
            $err_descripcion = "La descripción es un campo obligatorio";
        } else {
            if(strlen($temp_descripcion) > 255) {
                $err_descripcion = "La descripción no puede ser superior a 255 caracteres";
            } else {
                $descripcion = $temp_descripcion;
            }
        }

        //Validación de la cantidad
        if(strlen($temp_cantidad) == 0) {
            $err_cantidad = "La cantidad es un campo obligatorio";
        } else {
            if(filter_var($temp_cantidad, FILTER_VALIDATE_INT) === FALSE) {
                $err_cantidad = "La cantidad tiene que ser un número entero";
            } else {
                $temp_cantidad = (int)$err_cantidad;
                if($temp_cantidad < 0) {
                    $err_cantidad = "La cantidad no puede ser negativa";
                } else {
                    if($temp_cantidad > 99999) {
                        $err_cantidad = "La cantidad no puede ser superior a 99999";
                    } else {
                        $cantidad = $temp_cantidad;
                    }
                }
            }
        }
        
        if(isset($nombre) && isset($precioProducto) && isset($descripcion) && isset($cantidad)) {
            $sql = "INSERT INTO productos
                    VALUES($nombre,
                            $precio,
                            $descripcion,
                            $cantidad)";
            $conexion -> query($sql);
        }
    }
    
    
    ?>

<form action="" method="post">
    <fieldset>
        <label>Nombre Producto: </label>
        <input type="text" name="nombreProducto">
        <?php if(isset($err_nombre)) echo $err_nombre ?>
        <br><br>
        <label>Precio: </label>
        <input type="number" name="precioProducto">
        <?php if(isset($err_precio)) echo $err_precio ?>
        <br><br>
        <label>Descripción: </label>
        <input type="text" name="descripcion">
        <?php if(isset($err_descripcion)) echo $err_descripcion ?>
        <br><br>
        <label>Cantidad: </label>
        <input type="number" name="cantidad">
        <?php if(isset($err_precio)) echo $err_precio ?>
        <br><br>
        <input type="submit" value="Añadir">
    </fieldset>
</form>

</body>
</html>