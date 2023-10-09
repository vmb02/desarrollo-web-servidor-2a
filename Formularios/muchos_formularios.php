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

    </fieldset>
</form>

</body>
</html>