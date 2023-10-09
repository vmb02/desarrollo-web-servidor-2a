<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IVA</title>
    <?php require '../Funciones/iva.php'; ?>
    <?php require '../Funciones/irpf.php'; ?>
</head>
<body>
    
<h1>FORMULARIO IVA</h1>

<form action="" method="post">
    <fieldset>
    <label for="precio">Precio sin IVA:</label>
    <br>
    <input type="number" step="0.1" id="precio" name="precio">
    <br><br>
    <select name="tipoIVA">
        <option value="GENERAL">General</option>
        <option value="REDUCIDO">Reducido</option>
        <option value="SUPERREDUCIDO">Superreducido</option>
        <option value="SIN IVA">Sin IVA</option>
    </select>
    <br><br>
    <input type="hidden" name="action" value="iva">
    <input type="submit" name="Calcular">
    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["action"] == "iva") {
            $precio = (float) $_POST["precio"];
            $tipo = $_POST["tipoIVA"];
            echo precioConIva($precio, $tipo);
        } 
    } 
        
        ?>
    </fieldset>
</form>



<h1>FORMULARIO IRPF</h1>

<form action="" method="post">
    <fieldset>
    <label>Salario</label>
    <input type="number" step="1000" name="salario"><br><br>
    <input type="hidden" name="action" value="irpf">
    <input type ="submit" value="Calcular">
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["action"] == "irpf") {
            $salario = (float) $_POST["salario"];
            echo irpf($salario);
        }
    }
    ?>
    </fieldset>
</form>

</body>
</html>