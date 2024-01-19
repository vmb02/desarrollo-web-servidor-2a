<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Train Type</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <br>
    <div class="container" style="background-color: lightgrey; border-radius:1rem">
        <br>
        <h2 style="color:rgb(0, 141, 12)">Editar Train Type</h2><br>
        <form method="post" action="{{route('trainstype.update', ['trainstype'=>$train_type->id])}}">    
            @csrf
            {{ method_field('PUT') }}
            <label>Type: </label>
            <input type="text" name="type" value="{{ $train_type->type}}"><br><br>
            <input class="btn btn-success" type="submit" value="Editar">
        </form>
        <br>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>