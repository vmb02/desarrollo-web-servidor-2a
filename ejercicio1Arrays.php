<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Arrays</title>
</head>
<body>

    <?php

    echo "<h1>Ejercicio 1</h1>";

    //Mostrar los números pares del 1 al 50

    $numeros = [];

    for($i = 1; $i <= 50; $i++) {
        if($i%2 == 0) {
            array_push($numeros, $i);
        }
    }

    print_r($numeros);
    echo "<br><br>";

    //Para barajar utilizamos el método shuffle
    shuffle($numeros);
    print_r($numeros);
    echo "<br><br>";

    //Mostrar los números en orden descendente
    rsort($numeros);
    print_r($numeros);
    echo "<br><br>";


    echo "<h1>Ejercicio 2</h1>";
    echo "<h3>Genera 10 números aleatorios entre el 0 y el 100. Almacénalos en un array y muéstralos de mayor a menor y de menos a mayor</h3>";

    $aleatorios = [];
    for($i = 0; $i < 10; $i++) {
        array_push($aleatorios, rand(1, 100));
    }
    print_r($aleatorios);

    echo "<h3>Ordenado en orden descendente: </h3>";
    rsort($aleatorios);
    print_r($aleatorios);


    echo "<h3>Ordenado en orden ascendente: </h3>";
    sort($aleatorios);
    print_r($aleatorios);
    echo "<br><br>";

    echo "<h1>Ejercicio 3</h1>";
    echo "<h3>Dada la lista de países y sus capitales mostrada en la siguiente página, muéstralos en una tabla ordenados por los nombres de sus países.</h3>";

    $paises = array( "Italy"=>"Rome", "Luxembourg" =>"Luxembourg" , "Belgium"=>
    "Brussels" , "Denmark"=>"Copenhagen" , "Finland"=>"Helsinki" , "France" =>
    "Paris", "Slovakia" =>"Bratislava" , "Slovenia" =>"Ljubljana" , "Germany" =>
    "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin",
    "Netherlands" =>"Amsterdam" , "Portugal" =>"Lisbon", "Spain"=>"Madrid",
    "Sweden"=>"Stockholm" , "United Kingdom" =>"London", "Cyprus"=>"Nicosia",
    "Lithuania" =>"Vilnius", "Czech Republic" =>"Prague", "Estonia"=>"Tallin",
    "Hungary"=>"Budapest" , "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" =>
    "Vienna", "Poland"=>"Warsaw");

    ?>

    <table border="1">
        <tr>
            <th>Países</th>
            <th>Capitales</th>
        </tr>

<?php
    ksort($paises);
    foreach($paises as $pais => $capital) {
        echo "<tr><td>$pais</td><td>$capital</td></tr>";
    }

?>
    </table>

<?php

    echo "<h1>Ejercicio 4</h1>";
    echo "<h3>Crea un array multidimensional que contenga la siguiente información de series: título, plataforma y temporadas.</h3>";
    echo "<h3>Crea al menos 5 series con sus respectivos títulos, plataforma y temporadas.</h3>";
    echo "<h3>Muéstralos en tres tablas. Una los mostrará tal y como los has añadido, otra ordenados por temporada (de menor a mayor)
    y otra ordenados por la plataforma a la que pertenecen, y si la plataforma es igual, por el título.</h3>";

    $series = [
        ["Breaking Bad", "Netflix", "6"],
        ["Prison Break", "Disney Plus", "5"],
        ["La casa de papel", "Netflix", "4"],
        ["Better call Saul", "Netflix", "3"],
        ["Sex Education", "Netflix", "6"],
    ];

    ?>

    <table border="1">
        <tr>
            <th>Título</th>
            <th>Plataforma</th>
            <th>Temporadas</th>
        </tr>

<?php
    foreach($series as $serie) {
        list($titulo, $plataforma, $temporadas) = $serie;
        echo "<tr><td>$titulo</td><td>$plataforma</td><td>$temporadas</td></tr>";
    }
?>
    </table>
    <br><br>
    <h3>Ordenado por temporada de menor a mayor:</h3>

    <table border="1">
        <tr>
            <th>Título</th>
            <th>Plataforma</th>
            <th>Temporadas</th>
        </tr>

<?php
    $c_titulo = array_column($series, 0);
    $c_plataforma = array_column($series, 1);
    $c_temporadas = array_column($series, 2);
    array_multisort($c_temporadas, SORT_ASC, $series);
    foreach($series as $serie) {
        list($titulo, $plataforma, $temporadas) = $serie;
        echo "<tr><td>$titulo</td><td>$plataforma</td><td>$temporadas</td></tr>";
    }
    echo "<br><br>";
?>
    </table>
    <br><br>
    <h3>Ordenado por plataforma, y si la plataforma es igual, por el título: </h3>

    <table border="1">
        <tr>
            <th>Título</th>
            <th>Plataforma</th>
            <th>Temporadas</th>
        </tr>

<?php
    $c_titulo = array_column($series, 0);
    $c_plataforma = array_column($series, 1);
    $c_temporadas = array_column($series, 2);
    array_multisort($c_plataforma, SORT_ASC, $c_titulo, SORT_ASC, $series);
    foreach($series as $serie) {
        list($titulo, $plataforma, $temporadas) = $serie;
        echo "<tr><td>$titulo</td><td>$plataforma</td><td>$temporadas</td></tr>";
    }
    echo "<br><br>";
?>
    </table>
<?php
    echo "<h1>Ejercicio 5</h1>";
    echo "<h3>Crear un array de estudiantes y, aleatoriamente, asignarles una nota del 0 al 10.</h3>";
    echo "<h3>Mostrar los estudiantes en una tabla que contenga sus nombres, la nota que han sacado y la calificación final (suspenso, aprobado, notable o sobresaliente).</h3>";
    echo "<h3>Ordenar los estudiantes por orden alfabético.</h3>";

    $estudiantes = [
        "Jesús" => rand(0,10),
        "Marina" => rand(0,10),
        "José David" => rand(0,10),
        "Valeria" => rand(0,10),
        "Francisco" => rand(0,10),
    ];
    print_r($estudiantes);

    ?>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Nota</th>
            <th>calificación Final</th>
        </tr>

<?php
    ksort($estudiantes);
    foreach($estudiantes as $nombre => $nota) {
        echo "<tr><td>$nombre</td><td>$nota</td>";
        $calificacion = match(true) {
            $nota>=0 && $nota <5 => "Suspenso",
            $nota >=5 && $nota < 7 => "Aprobado",
            $nota >= 7 && $nota < 9 => "Notable",
            $nota >= 9 && $nota <= 10 => "Sobresaliente",
            default => "ERROR"
        };
        echo "<td>$calificacion</td>";
        /*
        switch($nota) {
            case 0: case 1: case 2: case 3: case 4:
                echo "<td>Suspenso</td>"; break;
            case 5: 
                echo "<td>Aprobado</td>"; break;
            case 6:
                echo "<td>Bien</td>"; break;
            case 7: case 8:
                echo "<td>Notable</td>"; break;
            case 9: case 10:
                echo "<td>Sobresaliente</td>"; break;
        }*/
        
        echo "</tr>";
    }

?>
    </table>

</body>
</html>