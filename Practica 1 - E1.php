<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    echo "<h1>Ejercicio 1</h1>";
    

    for($i=1;$i<10;$i++) {
?>
    <table border=1>
        <tr><th>Tabla del <?php echo $i ?></th></tr>
    
    <?php
    for($j=1;$j<=10;$j++) {
       $res = $i*$j;
       echo "<tr><td>$i x $j=$res</td></tr>";
       
       
    }


?>
    </table>
        <br>
    <?php
    }





?>
</body>
</html>