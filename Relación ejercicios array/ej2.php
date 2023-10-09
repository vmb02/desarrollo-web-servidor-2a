<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

    echo "<h3>Modifica el array anterior para que además de los productos y sus precios almacene la cantidad 
    que se ha comprado de cada producto. Muestra en una columna adicional el precio total de cada producto
    (producto x cantidad) y al final de la tabla el precio total de todos los productos comprados y la cantidad
    de productos adquiridos.</h3>";

    $productos = [
        ["Oreo", 1.50, 45],
        ["Sandwich", 1.20, 25],
        ["Caña", 1, 53],
        ["Choco Bom", 1.50, 64],
    ];

    ?>

    <table border=1>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Precio total</th>
        </tr>

        <?php
    $precio_total = 0;
    $c_nombre = array_column($productos, 0);
    $c_precio = array_column($productos, 1);
    $c_cantidad = array_column($productos, 2);
    $c_precioTotalProducto = array_column($productos, 3);
    array_multisort($c_nombre, SORT_ASC, $productos);
    foreach($productos as $producto) {
        list($nombre, $precio, $cantidad) = $producto;
        $precioTotalProducto = $precio * $cantidad;
        echo "<tr><td>$nombre</td><td>$precio</td><td>$cantidad</td><td>$precioTotalProducto</td></tr>";
        $precio_total += $precioTotalProducto;
    }
?>
    </table>

    <?php
    echo "<h4>Precio total de los productos: $precio_total";
    echo "<h4>Total de productos: " . sizeof($productos) . "</h4>";



?>
</body>
</html>