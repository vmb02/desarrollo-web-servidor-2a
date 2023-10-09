<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

    echo "<h3>Crea un array que almacene nombres de productos y sus respectivos precios.
    Muestra en una tabla los productos con sus precios, ordenados alfabéticamente por el nombre del producto.
    Muestra también el precio total de todos los productos y cuántos productos hay en el array. </h3>";

    $productos = [
        ["Oreo", 1.50],
        ["Sandwich", 1.20],
        ["Caña", 1],
        ["Choco Bom", 1.50],
    ];

    ?>

    <table border=1>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
        </tr>

        <?php
    $precio_total = 0;
    $c_nombre = array_column($productos, 0);
    $c_precio = array_column($productos, 1);
    array_multisort($c_nombre, SORT_ASC, $productos);
    foreach($productos as $producto) {
        list($nombre, $precio) = $producto;
        echo "<tr><td>$nombre</td><td>$precio</td></tr>";
        $precio_total += $precio;
    }
?>
    </table>

    <?php
    echo "<h4>Precio total de los productos: $precio_total";
    echo "<h4>Total de productos: " . sizeof($productos) . "</h4>";
?>

</body>
</html>