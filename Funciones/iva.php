<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IVA</title>
</head>
<body>
    
<?php

    DEFINE("SUPERREDUCIDO", 4);
    DEFINE("REDUCIDO", 10);
    DEFINE("GENERAL", 21);
    DEFINE("SIN IVA", 0);

    function precioSinIva(float|int $precio, string $iva) : float {
        $iva = strtoupper($iva);
        $precioSinIva = match ($iva) {
            "SUPERREDUCIDO" => $precio - $precio * (SUPERREDUCIDO/100),
            "REDUCIDO" => $precio - $precio * (REDUCIDO/100),
            "GENERAL" => $precio - $precio * (GENERAL/100),
            "SIN IVA" => $precio
        };
        return $precioSinIva;
    }


    function precioConIva(float|int $precio, string $iva) : float {
        $iva = strtoupper($iva);
        $precioConIva = match ($iva) {
            "SUPERREDUCIDO" => $precio + $precio * (SUPERREDUCIDO/100),
            "REDUCIDO" => $precio + $precio * (REDUCIDO/100),
            "GENERAL" => $precio + $precio * (GENERAL/100),
            "SIN IVA" => $precio
        };
        return $precioConIva;
    }

    /*
    echo "<h3>" . precioSinIva(12, "SUPERREDUCIDO") . "</h3>";
    echo "<h3>" . precioSinIva(10, "REDUCIDO") . "</h3>";
    echo "<h3>" . precioSinIva(100, "GENERAL") . "</h3>";
    echo "<h3>" . precioSinIva(135, "SIN IVA") . "</h3>";

    echo "<br><br>";

    echo "<h3>" . precioConIva(35, "SUPERREDUCIDO") . "</h3>";
    echo "<h3>" . precioConIva(10, "REDUCIDO") . "</h3>";
    echo "<h3>" . precioConIva(35, "GENERAL") . "</h3>";
    echo "<h3>" . precioConIva(35, "SIN IVA") . "</h3>";
*/


?>

</body>
</html>