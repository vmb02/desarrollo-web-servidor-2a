<?php

function convertirDivisa(int|float $cantidad, string $moneda1, string $moneda2) : float {

    $moneda1 = strtoupper($moneda1);
    $moneda2 = strtoupper($moneda2);

    $dineroFinal = match(true) {
        $moneda1 == "EURO" && $moneda2 == "DOLAR" => $cantidad*1.06,
        $moneda1 == "DOLAR" && $moneda2 == "EURO" => $cantidad*0.94,
        $moneda1 == "EURO" && $moneda2 == "YEN" => $cantidad*157.56,
        $moneda1 == "YEN" && $moneda2 == "EURO" => $cantidad*0.0063,
        $moneda1 == "DOLAR" && $moneda2 == "YEN" => $cantidad*148.73,
        $moneda1 == "YEN" && $moneda2 == "DOLAR" => $cantidad*0.0067,
        $moneda1 == $moneda2 => $cantidad
    };
    return $dineroFinal;
}

function sumatorio(int $numero) : int {
    $suma = 0;
    for($i = 1; $i <= $numero; $i++) {
        $suma += $i;
    }
    return $suma;
}

function factorial(int $numero) : int {
    $fact = 1;
    for($i = 1; $i <= $numero; $i++) {
        $fact *= $i;
    }
    return $fact;
}

function comprobarEstado(int $ejemplares) : string {
    if($ejemplares == 0) {
        return "Extinto";
    } else if($ejemplares>0 && $ejemplares<=500) {
        return "En peligro crítico";
    } else if($ejemplares>500 && $ejemplares<=2000) {
        return "En peligro";
    } else if($ejemplares > 2000) {
        return "Amenazado";
    }
}

?>