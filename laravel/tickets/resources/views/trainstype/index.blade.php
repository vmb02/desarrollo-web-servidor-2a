<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trains Types</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <br>
        <h2>Trains Type</h2><br>

        <p>
            <a href="{{ route('trainstype.create') }}">Crear Train Type</a>
        </p><br>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Type</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($train_types as $train_type)
                    <tr>
                        <td>{{ $train_type->type }}</td>
                        <td>
                            <form method="get" 
                            action="{{ route('trainstype.show', ['trainstype'=>$train_type->id])}}">
                                <input class="btn btn-secondary" type="submit" value="Ver">
                            </form>
                        </td>
                        <td>
                            <form method="get" 
                            action="{{ route('trainstype.edit', ['trainstype'=>$train_type->id])}}">
                                <input class="btn btn-success" type="submit" value="Editar">
                            </form>
                        </td>
                        <td>
                            <form method="post" 
                            action="{{ route('trainstype.destroy', ['trainstype'=>$train_type->id])}}">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" type="submit" value="Borrar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>