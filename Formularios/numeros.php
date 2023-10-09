<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparador</title>
    <?php require 'max.php'; ?>
</head>
<body>

<form action="" method="post">
        <label for="n1">Numero 1</label>
        <br>
        <input type="number" step="2" id="n1" name="n1">
        <br><br>
        <label for="n2">Numero 2</label>
        <br>
        <input type="number" step="2" id="n2" name="n2">
        <br><br>
        <label for="n3">Numero 3</label>
        <br>
        <input type="number" step="2" id="n2" name="n3">
        <br>
        <br>
        <input type="submit" name="Enviar">
    </form>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = (int) $_POST["n1"];
        $numero2 = (int) $_POST["n2"];
        $numero3 = (int) $_POST["n3"];
       
        echo maxi($numero1, $numero2, $numero3);        
    }

?>
</body>
</html>