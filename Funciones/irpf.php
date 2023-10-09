<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRPF</title>
</head>
<body>
    
<?php

    function IRPF(float|int $salarioBruto) : float {
        $salarioFinal;
        $tramo1 = 12450*0.19;
        $tramo2 = (20200 - 12450) * 0.24;
        $tramo3 = (35200-20200) * 0.3;
        $tramo4 = (60000 - 35200) * 0.37;
        $tramo5 = (300000 - 60000) * 0.45;

        if($salarioBruto <= 12450) {
            $salarioFinal = $salarioBruto - $salarioBruto * 0.19;
        } else if($salarioBruto <= 20200) {
            $salarioFinal = $salarioBruto - $tramo1 - ($salarioBruto - 12450) * 0.24;
        } else if($salarioBruto <= 35200) {
            $salarioFinal = $salarioBruto - $tramo1 - $tramo2 - ($salarioBruto - 20200) * 0.3;
        } else if($salarioBruto <= 60000) {
           $salarioFinal = $salarioBruto - $tramo1 - $tramo2 - $tramo3 - ($salarioBruto - 35200) * 0.37;
        } else if($salarioBruto <= 300000) {
            $salarioFinal = $salarioBruto - $tramo1 - $tramo2 - $tramo3 - $tramo4 - ($salarioBruto - 60000) * 0.45;
        } else {
            $salarioFinal = $salarioBruto - $tramo1 - $tramo2 - $tramo3 - $tramo4 - $tramo5 - ($salarioBruto - 300000) * 0.47;
        }
        return $salarioFinal;
    }

    /*
    echo "<h3>" . IRPF(30000) . "</h3>";
    echo "<h3>" . IRPF(400000) . "</h3>";
    echo "<h3>" . IRPF(25000) . "</h3>";
    echo "<h3>" . IRPF(40000) . "</h3>";
    echo "<h3>" . IRPF(60000) . "</h3>";
    echo "<h3>" . IRPF(120000) . "</h3>";
    echo "<h3>" . IRPF(400000) . "</h3>"; */

?>

</body>
</html>