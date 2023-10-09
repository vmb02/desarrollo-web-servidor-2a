<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php
    echo "<h1>Hola mundo</h1>";
    ?>
    <h2>Qué tal</h2>

    <?php
    echo "<h3>Tercer hola mundo</h3>";
    //Comentario
    /**
     * Más comentario
     */

     #Comentario

     $entero = 1; #int
     $decimal = 1.5; #float
     $exponente = 3e5; #exponente, igual que en Python


    #Para saber de qué tipo es y qué valor tiene una variable:
    var_dump($exponente);

    echo "<br><br>";

    $string1 = "Hola";
    $string2 = 'Miau';

    #Sólo podemos concatenar de esta manera usando comillas dobles
    echo "Texto: $string1";
    echo "<br>";
    echo 'Texto: $string1';
    echo "<br>";
    #La segunda forma de concatenar es usando el .
    echo $string1 . " " . $string2;
    echo "<br>";
    #Ambos ejemplos imprimen el mismo resultado
    echo "<h1>$string1</h1>";
    echo "<h1>" . $string1 . "</h1>";


    /*
    $array1 = [1,"2",3];
    $array2 = ["a", "b", "c"];
    var_dump($array1);
    echo "<br><br>";
    var_dump($array2); */

    $b = true;
    $c = false;
    echo "<br><br>";
    var_dump($b);

    echo "<br><br>";
    define("EDAD", 25);
    echo EDAD;


    echo "<br><br>";
    $dia = date("d");
    if($dia <= 15) {
        echo "Estamos a principios de mes";
    } else {
        echo "Estamos a finales de mes";
    }

    echo "<br><br>";
    $hora = date("H");
    if($hora < "12") {
        echo "Buenos días";
    } else if($hora < "20") {
        echo "Buenas tardes";
    } else {
        echo "Buenas noches";
    }

    echo "<br><br>";
    #Numero aleatorio del 1 al 150
    $aleatorio = rand(1,150);
    if($aleatorio < 10) {
        echo "El numero $aleatorio tiene un dígito.";
    } else if($aleatorio < 100) {
        echo "El numero " . $aleatorio . " tiene dos dígitos.";
    } else {
        echo "El numero $aleatorio tiene tres dígitos.";
    }


    echo "<br><br>";
    $n = rand(1,3);
    switch ($n) {
        case 1:
            echo "$n es igual a 1"; break;
        case 2: 
            echo "$n es igual a 2"; break;
        default:
            echo "$n es igual a 3"; break;
    }

    echo "<br><br>";
    $dia = date("l");
    echo $dia;
    
    switch($dia) {
        case "Monday": $dia = "Lunes"; break;
        case "Tuesday": $dia = "Martes"; break;
        case "Wednesday": $dia = "Miércoles"; break;
        case "Thursday": $dia = "Jueves"; break;
        case "Friday": $dia = "Viernes"; break;
        case "Saturday": $dia = "Sábado"; break;
        case "Sunday": $dia = "Domingo"; break;
    }

    echo "<br><br>";
    switch($dia) {
        case "Lunes":
        case "Miércoles":
        case "Viernes":
            echo "Hoy $dia clase de Desarrollo Web Entorno Servidor"; break;
        default: 
            echo "Hoy $dia no hay clase de Desarrollo Web Entorno Servidor"; break;
    }


    #Genera un numero aleatorio del 1 al 10 y muestra si es par o impar
    echo "<br><br>";
    $al = rand(1,10);
    if($al%2 == 0) {
        echo "El numero $al es par";
    } else {
        echo "El numero $al es impar";
    }


    #Muestra los números impares del 1 al 20 en una lista HTML
    echo "<br><br>";
    ?>
    <ul>
        <?php
            for($i = 1; $i <= 20; $i++) {
                if($i%2!=0) {
                    echo "<li>$i </li>";
                }
            }

    ?>
    </ul>

    <?php 
    echo "Mostrar los numeros pares del 0 al 20 y mostrar el resultado por pantalla";
    echo "<br><br>";
    $suma = 0;
    for($i = 0; $i < 20; $i++) {
        if($i%2 == 0) {
            $suma += $i;
            echo $i."+";
        }
    }
    $suma += 20;
    echo "20=".$suma;
    echo "<br><br>";
    echo "<br><br>";
   

    echo "Mostrar todos los numeros primos del 1 al 50: ";
    echo "<br><br>";
    echo "<br><br>";
    
    for($i = 2; $i <= 50; $i++) {
        $ok = true; 
        for($j = 2; $j <= $i/2 && $ok; $j++) {
            if($i%$j == 0) {
                $ok = false;  
            }
        }
        if($ok) {
            echo $i." ";
        }
    }

    echo "Mostrar los 50 primeros numeros primos: ";
    echo "<br><br>";
    echo "<br><br>";
    
    $contadore = 0;
    $i = 2;
    
    while($contadore <= 50) {
        $primo = true;
        for($j = 2; $j <= $i/2 && $primo; $j++) {
            if($i%$j == 0) {
                $primo = false;
            }
        }
        if($primo) {
            echo $i." ";
            $contadore++;
        }
        $i++;
    }

    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";

    #Genera un número aleatorio del -10 al 10 y muestra si es positivo, negativo o 0

    echo "<br><br>";
    $al2 = rand(-10,10);
    if($al2 < 0) {
        echo "El numero $al2 es negativo";
    } else if($al2 > 0) {
        echo "El numero $al2 es positivo";
    } else {
        echo "El numero $al2 es igual a 0";
    }

    #Muestra, en español, el día y el mes actual. Ejemplo: "1 de enero"


    echo "<br><br>";
    $diaa = date("l");
    $diia = date("j");
    $mees = date("F");

    switch($diaa) {
        case "Monday": $diaa = "Lunes"; break;
        case "Tuesday": $diaa = "Martes"; break;
        case "Wednesday": $diaa = "Miércoles"; break;
        case "Thursday": $diaa = "Jueves"; break;
        case "Friday": $diaa = "Viernes"; break;
        case "Saturday": $diaa = "Sábado"; break;
        case "Sunday": $diaa = "Domingo"; break;
    }

    switch($mees) {
        case "January": $mees = "Enero"; break;
        case "February": $mees = "Febrero"; break;
        case "March": $mees = "Marzo"; break;
        case "April": $mees = "Abril"; break;
        case "May": $mees = "Mayo"; break;
        case "June": $mees = "Junio"; break;
        case "July": $mees = "Julio"; break;
        case "August": $mees = "Agosto"; break;
        case "September": $mees = "Septiembre"; break;
        case "October": $mees = "Octubre"; break;
        case "November": $mees = "Noviembre"; break;
        case "December": $mees = "Diciembre"; break;
    }
    echo "Hoy es $diaa, $diia de $mees";

    #Muestra la zona horaria en la que nos encontramos
    echo "<br><br>";
    $zona = date("e");
    echo "Nos encontramos en la zona horaria: $zona"; 


    #Estructura match
    echo "<br><br>";

    $day = date("l");
    $de = match($day) {
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Miércoles",
        "Thursday" => "Jueves",
        "Friday" => "Viernes",
        "Saturday" => "Sábado",
        "Sunday" => "Domingo",
    };
    echo $de;

    echo "<br><br>";
    $month = date("F");
    $m = match($month) {
        "January" => "Enero",
        "February" => "Febrero",
        "March" => "Marzo",
        "April" => "Abril",
        "May" => "Mayo",
        "June" => "Junio",
        "July" => "Julio",
        "August" => "Agosto", 
        "September" => "Septiembre",
        "October" => "Octubre", 
        "November" => "Noviembre",
        "December" => "Diciembre"
    };
    echo $m;


    #Bucle WHILE
    echo "<br><br>";
    $i = 0;
    while($i <= 10) {
        echo "$i ";
        $i++;
    }


    #Bucle DO WHILE
    echo "<br><br>";
    $k = 0;
    do {
        echo $k . "<br>";
        $k++;
    } while($k <= 10);


    #Bucle FOR
    echo "<br><br>";
    for($c = 0; $c <= 10; $c++) {
        echo $c . "<br>";
    }

    #Bucle FOR INACABADO
    echo "<br><br>";
    for($t = 0; ; $t++) {
        if($t > 10) break;
        echo $t . "<br>";
    }


    #Bucle FOR múltiplos de 2 o de 3 del 1 al 50(también se puede hacer con el XOR)
    echo "<br><br>";
    for($f = 1; $f <= 50; $f++) {
        if(($f%2 == 0 || $f%3 == 0) && $f%6 != 0) {
                echo $f . "<br>";
        }
    }

    
    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";

    $array1 = array(
        'key1' => "value1",
        'key2' => "value2",
        'key3' => "value3",
    );
    //Añadir elementos sin importar las claves array_push, si importan las claves se hace de la siguiente manera
    array_push($array1, 'value4', 'value5');
    $array1['key4'] = 'value4';
    $array1['key3'] = 'VALUE3';
    //Para eliminar elementos:
    unset($array1['key2']);

    //Para ordenar las claves utilizamos array_values:
    //$array1 = array_values($array1);



    $array2 = array('value1', 'value2', 'value3');

    print_r($array1);
    print("<br></br>");
    print_r($array2);
    

    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";

    $personas = [
        '54863201F' => "Daniel",
        '13648525G' => "Paula",
        '74658523M' => "Juan",
        '35719564G' => "Francisco",
    ];
    print_r($personas);
    
    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";


    ?>

    <ul>
    <?php

    //primera palabra es el array, la segunda es la variable donde vamos a almacenar los elementos del array
    foreach($personas as $persona) {
        echo "<li> $persona </li>";
    }
    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";
    ?>

    <ul>
    <?php
    foreach($personas as $dni => $nombre) {
        echo "<li>DNI: $dni, Nombre: $nombre</li>";
    }
    ?>
</ul>

<?php

    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";
    echo "<h1>Tabla DNI</h1>"
    ?>

    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($personas as $dni => $nombre) {
                echo "<tr>";
                echo "<td>$dni</td><td>$nombre</td>";
                echo "<tr>";
            }
            ?>
        </tbody>

    </table>

    <?php
    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";
    echo "<h1>Tabla ordenada con sort: </h1>"
    
    ?>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $aux_personas = $personas;
            sort($aux_personas);
            foreach($aux_personas as $dni => $nombre) {
                echo "<tr>";
                echo "<td>$dni</td><td>$nombre</td>";
                echo "<tr>";
            }
            ?>
        </tbody>

    </table>


    <?php
    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";
    echo "<h1>Tabla ordenada con rsort: </h1>"
    
    ?>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
             $aux_personas = $personas;
            rsort($aux_personas);
            foreach($aux_personas as $dni => $nombre) {
                echo "<tr>";
                echo "<td>$dni</td><td>$nombre</td>";
                echo "<tr>";
            }
            ?>
        </tbody>

    </table>

    <?php
    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";
    echo "<h1>Tabla ordenada con asort: </h1>"
    
    ?>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $aux_personas = $personas;
            asort($aux_personas);
            foreach($aux_personas as $dni => $nombre) {
                echo "<tr>";
                echo "<td>$dni</td><td>$nombre</td>";
                echo "<tr>";
            }
            ?>
        </tbody>

    </table>

    <?php
    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";
    echo "<h1>Tabla ordenada con arsort: </h1>"
    
    ?>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $aux_personas = $personas;
            arsort($aux_personas);
            foreach($aux_personas as $dni => $nombre) {
                echo "<tr>";
                echo "<td>$dni</td><td>$nombre</td>";
                echo "<tr>";
            }
            ?>
        </tbody>

    </table>

    <?php
    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";
    echo "<h1>Tabla ordenada con krsort: </h1>"
    
    ?>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $aux_personas = $personas;
            ksort($aux_personas);
            foreach($aux_personas as $dni => $nombre) {
                echo "<tr>";
                echo "<td>$dni</td><td>$nombre</td>";
                echo "</    tr>";
            }
            ?>
        </tbody>

    </table>

    <?php
    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";
    echo "<h1>Tabla ordenada con krsort: </h1>"
    
    ?>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $aux_personas = $personas;
            krsort($aux_personas);
            foreach($aux_personas as $dni => $nombre) {
                echo "<tr>";
                echo "<td>$dni</td><td>$nombre</td>";
                echo "</tr>";
            }
            ?>
        </tbody>

    </table>

</body>
</html>