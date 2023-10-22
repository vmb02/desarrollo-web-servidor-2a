<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potencia</title>
    <?php require '../Funciones/potencia.php'; ?>
</head>
<body>

    <form action="" method="post">
            <label for="base">Base</label>
            <input type="text" id="base" name="base">
            <?php if(isset($err_base)) echo $err_base ?>
            <br>
            <label for="exponente">Exponente</label>
            <input type="text" id="exponente" name="exponente">
            <?php if(isset($err_exponente)) echo $err_exponente ?>
            <br>
            <input type="submit" value="Calcular">
        </form> 

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_base = depurar($_POST["base"]);
        $temp_exponente = depurar($_POST["exponente"]);

        if(strlen($temp_base) > 0) {
            if(is_numeric($temp_base)) {
                $temp_base = (int)$temp_base;
                if($temp_base >= 0) {
                    $base = $temp_base;
                } else {
                    $err_base = "El número debe ser igual o mayor que 0";
                }
            } else {
                $err_base = "El tipo de dato no es correcto";
            }
        } else {
            $err_base = "No se ha introducido la base";
        }

        if(strlen($temp_exponente) > 0) {
            if(is_numeric($temp_exponente)) {
                $temp_exponente = (int)$temp_exponente;
                if($temp_exponente >= 0) {
                    $exponente = $temp_exponente;
                } else {
                    $err_exponente = "El número debe ser igual o mayor que 0";
                }
            } else {
                $err_exponente = "El tipo de dato no es correcto";
            }
        } else {
            $err_exponente = "No se ha introducido el exponente";
        }

        if(isset($base) && isset($exponente)) {
            echo "El resultado es " . potencia($base, $exponente);
        }
    }

    function depurar($entrada) {
        $salida = htmlspecialchars($entrada);
        $salida = trim($salida);
        return $salida;
    }
    ?>

</body>
</html>