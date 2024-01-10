<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platos</title>
</head>
<body>
    <h1>Este es el index de los platos</h1>
    <h2>{{ $mensaje }}</h2>

    <h2>Carta de la casa</h2>

    <table border=1>
        <thead>
            <tr>
                <th>Plato</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($platos as $plato)
            <tr>
                <td>{{$plato->nombre}}</td>
                <td>{{$plato->precio}}</td>
                <td>{{$plato->tipo}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>