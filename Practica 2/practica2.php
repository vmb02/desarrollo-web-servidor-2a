<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 2</title>
    <link rel="stylesheet" href="estilo.css">
    <?php require 'funciones.php'; ?>
</head>
<body>
    <h1>EJERCICIO 1</h1>
    <form action="" method="post">
        <fieldset>
            <label for="cantidad">Cantidad: </label><br>
            <input type="number" step="0.01" id="cantidad" name="cantidad">
            <br><br>
            <label for="divisa1">Divisa 1: </label><br>
            <input type="Radio" name="divisa1" value="EURO">€<br>
            <input type="Radio" name="divisa1" value="DOLAR">$<br>
            <input type="Radio" name="divisa1" value="YEN">¥<br><br>
            <label for="divisa2">Divisa 2: </label><br>
            <input type="Radio" name="divisa2" value="EURO">€<br>
            <input type="Radio" name="divisa2" value="DOLAR">$<br>
            <input type="Radio" name="divisa2" value="YEN">¥<br>
            <input type="hidden" name="action" value="cambioDivisa">
            <input type="submit" name="Calcular">
            <br>
            <?php

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                if($_POST["action"] == "cambioDivisa") {
                    $cantidad = (float) $_POST["cantidad"];
                    $divisa1 = $_POST["divisa1"];
                    $divisa2 = $_POST["divisa2"];
                    echo convertirDivisa($cantidad, $divisa1, $divisa2);
                }
            }
            ?>
        </fieldset>
    </form>

    <h1>EJERCICIO 2</h1>
    <form action="" method="post">
        <fieldset>
            <label for="numero">Número: </label><br>
            <input type="number" id="numero" name="numero">
            <br><br>
            <label for="operacion">Operación: </label>
            <select name="operacion">
                <option value="sumatorio">Sumatorio</option>
                <option value="factorial">Factorial</option>
            </select>
            <br><br>
            <input type="hidden" name="action" value="operaciones">
            <input type="submit" name="Calcular">
            <br>
            <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                if($_POST["action"] == "operaciones") {
                    $numero = (int) $_POST["numero"];
                    $operacion = $_POST["operacion"];
                    if($numero >= 0) {
                        if($operacion == "sumatorio") {
                            echo sumatorio($numero);
                        } else {
                            echo factorial($numero);
                        }
                    } else {
                        echo "ERROR: Número no válido";
                    }
                }
            }
            ?>
        </fieldset>
    </form>

    <h1>EJERCICIO 3</h1>

    <?php
        $animales = [
            ["Lobo ibérico", "Mamífero", 2500],
            ["Lince ibérico", "Mamífero", 1668],
            ["Quebrantahuesos", "Ave", 2000],
            ["Oso pardo", "Mamífero", 500]
        ];
    ?>

    <form action="" method="post">
        <fieldset>
            <label for="especie">Especie: </label>
            <br>
            <input type="text" id="especie" name="especie">
            <br><br>
            <input type="hidden" name="action" value="especies">
            <input type="submit" name="Calcular">
            <br>
            <?php  
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                if($_POST["action"] == "especies") {
                   $especieAnimal = $_POST["especie"];
                   foreach($animales as $animal) {
                        list($especie, $clase, $ejemplares) = $animal;
                        if($especieAnimal == $especie) {
                            echo "El " . $especieAnimal . " está " . comprobarEstado($ejemplares);
                        } 
                   }
                } 
            } 
            ?>
        </fieldset>
    </form>

    <h3>Lista de especies</h3>
    <table border=1>
        <thead>
            <tr>
                <th>Especie</th>
                <th>Clase</th>
                <th>Ejemplares</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
<?php
    foreach($animales as $animal) {
        list($especie, $clase, $ejemplares) = $animal;
        echo "<tr>
            <th>$especie</th>
            <th>$clase</th>
            <th>$ejemplares</th>
            <th>" . comprobarEstado($ejemplares) . "</th>
        </tr>";
    }

?>
        </tbody>
    </table>

</body>
</html>