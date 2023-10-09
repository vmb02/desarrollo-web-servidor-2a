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

    $juegos = [
        ["Pacman", "Atari", 60],
        ["Fornite", "PS4", 0],
        ["Mario Kart", "Super Nintendo", 70],
        ["Street Fighter", "PS4", 50],
        ["Legend of Zelda", "Nintendo 64", 40],
        ["Castelvania", "Nintendo 64", 55],
    ];

    foreach ($juegos as $juego) {
        list($nombre, $consola, $precio) = $juego;
        echo "<li>$nombre, $consola, $precio</li>";
    }

    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";
    echo "<h1>Tabla array multidimensional: </h1>"
?>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Consola</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($juegos as $juego) {
                    list($nombre, $consola, $precio) = $juego;
                    echo "<tr>";
                    echo "<td>$nombre</td><td>$consola</td><td>$precio</td>";
                    echo "</tr>";

                }
            ?>
        </tbody>
    </table>

    <?php
        echo "<br><br>";
        echo "<br><br>";
        echo "<br><br>";
        echo "<h1>Tabla array multidimensional: </h1>";

        $c_nombre = array_column($juegos, 0);
        $c_consola = array_column($juegos, 1);
        $c_precio = array_column($juegos, 2);
        array_multisort($c_consola, SORT_ASC, $c_nombre, SORT_ASC, $juegos);

        $c_precio = array_column($juegos, 2);
        array_multisort($c_precio, SORT_ASC, $juegos);
    ?>



<table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Consola</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($juegos as $juego) {
                    list($nombre, $consola, $precio) = $juego;
                    echo "<tr>";
                    echo "<td>$nombre</td><td>$consola</td><td>$precio</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <?php
    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";
    echo "<h3>Crea un array que contenga los números pares del 1 al 50 y muéstralos</h3>";

    $pares = [];

    for($i = 1; $i <=50; $i++) {
        if($i%2 == 0) {
            array_push($pares, $i);
        }
    }

    foreach($pares as $par) {
        echo $par . " ";
    }

    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>"; 
    echo "<h3>Investiga si hay algún método en PHP para barajar los elementos de un array</h3>"





    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>"; 
    echo "<h3>Una vez barajado, muestra los números en orden descendente</h3>"

?>
</body>
</html>