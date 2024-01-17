<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Train</title>
</head>
<body>
    <form method="post" action="{{route('trains.update', ['train'=>$train->id])}}">    
        @csrf
        {{ method_field('PUT') }}
        <label>Name: </label>
        <input type="text" name="name" value="{{ $train->name}}"><br><br>
        <label>Passengers: </label>
        <input type="number" step="1" name="passengers" value="{{ $train->passengers}}">
        <label>Year: </label>
        <input type="number" step="1" name="year" value="{{ $train->year}}">
        <label>Type: </label>
        <select name="train_type_id">
            <option value="1">Cercanías</option>
            <option value="2">Media Distancia</option>
            <option value="3">Alta Velocidad</option>
        </select>
        <br><br>
        <input type="submit" value="Editar">
    </form>
    
</body>
</html>