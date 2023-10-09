<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

    function sumaDos ($n1, $n2) {
        return $n1 + $n2;
    }

    function sumaDos1 (int $n1, int $n2) {
        return $n1 + $n2;
    }

    //Devuelve un float
    function sumaDos2 (int|float $n1, int|float $n2) : float {
        return $n1 + $n2;
    }

    $resultado = sumaDos(3,4);
    echo "<h3>$resultado</h3>";
    echo "<h3>Resultado de la suma de 3 y 8: " . sumaDos(3,8) . "</h3>";
 
    echo "<h3>Suma de entero y decimal: " . sumaDos2(3.5, 4) . "</h3>";

    echo "<br><br>"; 
    function calificacion(int|float $nota) : string {
        $notaf = match (true) {
            $nota >= 0 && $nota < 5 => "Suspenso",
            $nota >= 5 && $nota < 7 => "Aprobado",
            $nota >= 7 && $nota < 9 => "Notable",
            $nota >= 9 && $nota <= 10 => "Sobresaliente",
            default => "Error"        
        };
        return $notaf;
    }

    echo "<h3>La nota 5.5 es un: " . calificacion(5.5) . "</h3>";
    echo "<br><br>"; 

    function primos(int $p) : array {
        $primos = [];
        for($i=2;$i <= $p; $i++) {
            if(esPrimo($i)) array_push($primos, $i);
        }


        return $primos;
    }

    $primos = primos(75);
    foreach($primos as $primo) {
        echo "$primo ";
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
    

    $esPrimo = esPrimo(13);
    
    if($esPrimo) {
        echo "<h3>El número es primo</h3>";
    } else {
        echo "<h3>El número no es primo</h3>";
    }

?>
    
</body>
</html>