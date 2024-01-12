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

    <p>
        <a href="{{ route('platos.create') }}">Crear Plato</a>
    </p>

    <h2>Carta de la casa</h2>

    <table border=1>
        <thead>
            <tr>
                <th>Plato</th>
                <th>Precio</th>
                <th>Tipo</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($platos as $plato)
            <tr>
                <td>{{$plato->nombre}}</td>
                <td>{{$plato->precio}}</td>
                <td>{{$plato->tipo}}</td>
                <td>
                    <form method="get" 
                    action="{{ route('platos.show', ['plato'=>$plato->id])}}">
                        <input type="submit" value="Ver">
                    </form>
                </td>
                <td>
                    <form method="get" 
                    action="{{ route('platos.edit', ['plato'=>$plato->id])}}">
                        <input type="submit" value="Editar">
                    </form>
                </td>
                <td>
                    <form method="post" 
                    action="{{ route('platos.destroy', ['plato'=>$plato->id])}}">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>