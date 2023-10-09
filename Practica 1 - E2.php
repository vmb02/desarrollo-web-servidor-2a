<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

echo "<h1>Ejercicio 2</h1>";

$temperaturas = [
    ["Málaga", 20, 27],
    ["Sevilla", 17, 36],
    ["Cádiz", 19, 31],
    ["Jaén", 19, 33],
    ["Granada", 12, 35],
    ["Almería", 20, 27],
    ["Huelva", 16, 33]
];

    for($i=0; $i < count($temperaturas); $i++) {
        $temperaturas[$i][3] = ($temperaturas[$i][1]+$temperaturas[$i][2])/2;
    }


    $c_capital = array_column($temperaturas, 0);
    $c_tmin = array_column($temperaturas, 1);
    $c_tmax = array_column($temperaturas, 2);
    $c_tmedia = array_column($temperaturas, 3);
    array_multisort($c_tmin, SORT_ASC, $c_capital, SORT_ASC, $temperaturas);
?>

    <table border=1>
        <tr>
            <th>Capital</th>
            <th>Temperatura mínima</th>
            <th>Temperatura máxima</th>
            <th>Temperatura media</th>
        </tr> <?php
        //Temperatura minima total y maxima total
        $mint = 0;
        $maxt = 0;
        foreach($temperaturas as $temperatura) {
            list($cap, $min, $max, $med) = $temperatura;
            echo "<tr><td>$cap</td><td>$min</td><td>$max</td><td>$med</td></tr>";
            $mint += $min;
            $maxt += $max;
        }
?>
    </table>
    <h3>Temperatura mínima media: <?php echo $mint/count($temperaturas); ?></h3>
    <h3>Temperatura máxima media: <?php echo $maxt/count($temperaturas); ?></h3>

</body>
</html>