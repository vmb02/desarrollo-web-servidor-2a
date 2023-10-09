<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    
    <h2>Insertar producto</h2>

    <form action="" method="post">
        <fieldset>
        <label for="producto">Producto</label>
        <br>
        <input type="text" id="producto" name="producto">
        <br><br>
        <label for="precio">Precio</label>
        <br>
        <input type="number" step="0.1" id="precio" name="precio">
        <br><br>
        <label for="cantidad">Cantidad</label>
        <br>
        <input type="number" step="1" id="cantidad" name="cantidad">
        <br><br>
        <input type="submit" name="Insertar">
        </fieldset>
    </form>

    <br><br>
    <h1>Productos</h1>

<?php

    $lista = [
        ["PS5", 500, 3],
        ["Aceite de Oliva", 8.50, 8]
    ];


    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombreProducto = $_POST["producto"];
        $precioProducto = (float) $_POST["precio"];
        $cantidadProducto = (int) $_POST["cantidad"];
        array_push($lista, [$nombreProducto, $precioProducto, $cantidadProducto]);
    }


?>
    <br><br><br>

    <table border=1>
        <thead>
        <tr>
            <th>PRODUCTO</th>
            <th>PRECIO</th>
            <th>CANTIDAD</th>
        </tr>
        </thead>
        <tbody>
<?php

    foreach($lista as $producto) {
        list($nombre, $precio, $cantidad) = $producto;
        echo "<tr>
            <th>$nombre</th>
            <th>$precio</th>
            <th>$cantidad</th>
        </tr>";
    }

?>
    </tbody>
    </table>
</body>
</html>