<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

    echo "<h1>Ejercicio 3</h1>";

    $cuadradosp = [];
    $contador = 0;
    $i = 1;
    while($contador<50) {
        if(pow(intval(sqrt($i)),2) == $i) {
            $contador++;
            $cuadradosp[$i] = intval(sqrt($i));
        }
        $i++;
    }

?>
    <table border=1>
        <tr>
            <th>Cuadrado Perfecto</th>
            <th>Raíz Cuadrada</th>
        </tr>
        <?php
        foreach($cuadradosp as $cuadrados) {
            echo "<tr><td>" . pow($cuadrados, 2) . "</td><td>$cuadrados</td></tr>";
        }

?>
    </table>

</body>
</html>