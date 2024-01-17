<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trains</title>
</head>
<body>
    <h2>Trains</h2>

    <p>
        <a href="{{ route('trains.create') }}">Crear Train</a>
    </p><br>

    <table border=1>
        <thead>
            <tr>
                <th>Name</th>
                <th>Passengers</th>
                <th>Year</th>
                <th>Tipo</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trains as $train)
                <tr>
                    <td>{{ $train->name }}</td>
                    <td>{{ $train->passengers }}</td>
                    <td>{{ $train->year }}</td>
                    <td>{{ $train->train_type->type }}</td>
                    <td>
                        <form method="get" 
                        action="{{ route('trains.show', ['train'=>$train->id])}}">
                            <input type="submit" value="Ver">
                        </form>
                    </td>
                    <td>
                        <form method="get" 
                        action="{{ route('trains.edit', ['train'=>$train->id])}}">
                            <input type="submit" value="Editar">
                        </form>
                    </td>
                    <td>
                        <form method="post" 
                        action="{{ route('trains.destroy', ['train'=>$train->id])}}">
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