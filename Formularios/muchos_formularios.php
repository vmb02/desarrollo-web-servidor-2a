<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muchos formularios</title>
    <?php require '../Funciones/muchas_funciones.php'; ?>

</head>
<body>
<h1>FORMULARIO TEMPERATURA</h1>
<form action="" method="post">
    <fieldset>
        <label for="temperatura">Temperatura</label><br>
        <input type="text" id="temperatura" name="temperatura">
        <br><br>
        <label for="temperatura1">Temperatura 1</label><br>
        <select name="temperatura1">
            <option value="C">C</option>
            <option value="F">F</option>
            <option value="K">K</option>
        </select>
        <br><br>
        <label for="temperatura2">Temperatura 2</label><br>
        <select name="temperatura2">
            <option value="C">C</option>
            <option value="F">F</option>
            <option value="K">K</option>
        </select>
        <input type="hidden" name="action" value="temperatura">
        <input type="submit" name="Calcular">
        <br>
        <?php

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST["action"] == "temperatura") {
                $temperatura = (float) $_POST["temperatura"];
                $t1 = $_POST["temperatura1"];
                $t2 = $_POST["temperatura2"];
                echo "La temperatura convertida es: " . convertidor($temperatura, $t1, $t2);
            } 
        } 
        
        ?>
    </fieldset>
</form>
    
<h1>FORMULARIO MÁXIMO DE 3 NÚMEROS</h1>

<form action="" method="post">
    <fieldset>
        <label for="n1">Número 1</label>
        <br>
        <input type="number" id="n1" name="n1">
        <br><br>
        <label for="n2">Número 2</label>
        <br>
        <input type="number" id="n2" name="n2">
        <br><br>
        <label for="n3">Número 3</label>
        <br>
        <input type="number" id="n3" name="n3">
        <br>
        <input type="hidden" name="action" value="maximo3">
        <input type="submit" name="Calcular">
        <br>
        <?php

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST["action"] == "maximo3") {
                $n1 = (int) $_POST["n1"];
                $n2 = (int) $_POST["n2"];
                $n3 = (int) $_POST["n3"];
                echo maxi($n1, $n2, $n3);
            }
        }

        ?>
    </fieldset>
</form>

<h1>FORMULARIO POTENCIA</h1>

<form action="" method="post">
    <fieldset>
        <label for="base">Base: </label>
        <br>
        <input type="number" id="base" name="base">
        <br><br>
        <label for="exponente">Exponente: </label>
        <br>
        <input type="number" id="exponente" name="exponente">
        <br>
        <input type="hidden" name="action" value="potencia">
        <input type="submit" name="Calcular">
        <br>
        <?php

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST["action"] == "potencia") {
                $base = (int) $_POST["base"];
                $exponente = (int) $_POST["exponente"];
                echo $base . " elevado a " . $exponente . " es: " . potencia($base, $exponente);
            }
        }
    ?>
    </fieldset>

<h1>FORMULARIO PRIMOS</h1>
<form action="" method="post">
    <fieldset>
        <label for="nPrimos">Número de primos: </label>
        <br>
        <input type="number" id="nPrimos" name="nPrimos">
        <br>
        <input type="hidden" name="action" value="primos">
        <input type="submit" name="Calcular">
        <br>
        <?php

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST["action"] == "primos") {
                $numeroPrimos = (int) $_POST["nPrimos"];
                echo "Los " . $numeroPrimos . " primeros números primos son: ";
                print_r(primos($numeroPrimos));
            }
        }
        ?>
    </fieldset>

</body>
</html>