<?php

function convertidor(int|float $temperatura, string $t1, string $t2) : float {
    $t1 = strtoupper($t1);
    $t2 = strtoupper($t2);

    $tFinal = match(true) {
        $t1 == "C" && $t2 == "F" => ($temperatura * 9 / 5) + 32,
        $t1 == "F" && $t2 == "C" => ($temperatura-32) * 5 / 9,
        $t1 == "C" && $t2 == "K" => $temperatura + 273.15,
        $t1 == "K" && $t2 == "C" => $temperatura - 273.15,
        $t1 == "K" && $t2 == "F" => ($temperatura - 273.15) * 9 / 5 +32,
        $t1 == "F" && $t2 == "K" => ($temperatura - 32) * 5 / 9 + 273.15,
        $t1 == $t2 => $temperatura
    };
    return $tFinal;
}

function maxi(int $num1, int $num2, int $num3) : string {
    if($num1 == $num2 && $num2 == $num3) {
        return "Los tres números son iguales";
    } else {
        $candidato = $num1;
        if($num2>$num1) {
            $candidato = $num2;
        }
        if($num3>$candidato) {
            $candidato = $num3;
        }
        return "El mayor es $candidato";
    }
}

function potencia(int $b, int $e) : int {
    $resultado = 1;
    if($e >= 0) {
        for($i=1; $i<=$e; $i++) {
            $resultado *= $b;
        }
    }
    
    return $resultado;
}

function primos(int $p) : array {
    $primos = [];
    for($i=2;$i <= $p; $i++) {
        if(esPrimo($i)) array_push($primos, $i);
    }
    return $primos;
}


function esPrimo(int $numero) : bool {

        $primo = true;
        for($j = 2; $j <= $numero-1 && $primo; $j++) {
            if($numero%$j == 0) {
                    $primo = false;
            }
        }
            
    return $primo;
}

?>