<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carta del restaurante</title>
</head>
<body>
    <h1>Este es el index de nuestra carta</h1>
    <h2>{{ $mensaje }}</h2>

    <h2>Nuestros platos</h2>

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
                <td>{{$plato[0]}}</td>
                <td>{{$plato[1]}}</td>
                <td>{{$plato[2]}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Nuestras bebidas</h2>

    <table border=1>
        <thead>
            <tr>
                <th>Bebida</th>
                <th>Precio</th>
                <th>Formato</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bebidas as $bebida)
            @php
              list($l_bebida, $l_precio, $l_tipo) = $bebida;  

            @endphp
            <tr>
                <td>{{$l_bebida}}</td>
                <td>{{$l_precio}}</td>
                <td>{{$l_tipo}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>