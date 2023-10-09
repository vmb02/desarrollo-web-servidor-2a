<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

    function potencia(int $b, int $e) : int {
        $resultado = 1;
        if($e >= 0) {
            for($i=1; $i<=$e; $i++) {
                $resultado *= $b;
            }
        }
        
        return $resultado;
    }
/*
    echo "<h3>" . potencia(0,1) . "<h3>";
    echo "<h3>" . potencia(3,2) . "<h3>";
    echo "<h3>" . potencia(3,3) . "<h3>";
*/
?>

</body>
</html>