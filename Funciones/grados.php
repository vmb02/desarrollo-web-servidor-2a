<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

    function caF (int|float $gradosC) : float {
        return ($gradosC * 9 / 5) + 32;
    }

    echo "<h3>36 grados celsius en Fahrenheit son: " . caF(36) . "</h3>";

    function faC (int|float $gradosF) : float {
        return ($gradosF-32) * 5 / 9;
    }

    echo "<h3>25 grados Fahrenheit en Celsius son: " . faC(25) . "</h3>";

    function caK(int|float $gradosC) : float {
        return $gradosC + 273.15;
    }

    echo "<h3>25 grados Celsius en Kelvin son: " . caK(25) . "</h3>";

    function kaC(int|float $gradosK) : float {
        return $gradosK - 273.15;
    }

    echo "<h3>25 grados Kelvin en Celsius son: " . kaC(25) . "</h3>";

    function kaF(int|float $gradosK) : float {
        return ($gradosK - 273.15) * 9 / 5 +32;
    }

    echo "<h3>25 grados Kelvin en Fahrenheit son: " . kaF(25) . "</h3>";

    function faK(int|float $gradosF) : float {
        return ($gradosF - 32) * 5 / 9 + 273.15;
    }

    echo "<h3>25 grados Fahrenheit en Kelvin son: " . faK(25) . "</h3>";

    echo "<br><br>";

    function convertidor(int|float $temperatura, string $t1, string $t2) : float {
        $t1 = strtoupper($t1);
        $t2 = strtoupper($t2);

        $tFinal = match(true) {
            $t1 == "C" && $t2 == "F" => ($t1 * 9 / 5) + 32;,
            $t1 == "F" && $t2 == "C" => ($t1-32) * 5 / 9,
            $t1 == "C" && $t2 == "K" => $t1 + 273.15,
            $t1 == "K" && $t2 == "C" => $t1 - 273.15,
            $t1 == "K" && $t2 == "F" => ($t1 - 273.15) * 9 / 5 +32,
            $t1 == "F" && $t2 == "K" => ($t1 - 32) * 5 / 9 + 273.15,
            $t1 == $t2 => $temperatura
        };
        return $tFinal;
    }

    $m = convertidor(36, "C", "F");
    echo "<h3>$m</h3>";

    $m = convertidor(25, "F", "C");
    echo "<h3>$m</h3>";

    $m = convertidor(25, "C", "K");
    echo "<h3>$m</h3>";

    $m = convertidor(25, "K", "C");
    echo "<h3>$m</h3>";

    $m = convertidor(25, "K", "F");
    echo "<h3>$m</h3>";

    $m = convertidor(25, "F", "K");
    echo "<h3>$m</h3>";

?>

</body>
</html>