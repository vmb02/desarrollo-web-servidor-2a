<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

    echo "<h1>Ejercicio 4</h1>";

    $array = [[]];
    $a1 = [];
    $a2 = [];

    for($i=0;$i<10;$i++) {
        $a1[$i] = rand(1,10);
    }

    for($j=0;$j<10;$j++) {
        $a2[$j] = rand(10,100);
    }

   
    array_push($array, $a1);
    array_push($array, $a2);

?>

    <table border=1>
        <tr>
            <th>1</th>
            <th>2</th>
        </tr>
        <?php
        for($i=0; $i<;$i++) {
            
        }
        ?>
    </table>




</body>
</html>