<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Trains</title>
</head>
<body>
    <h1>Ver Train</h1>
    <p>Name: {{ $train->name }}</p>
    <p>Passengers: {{ $train->passengers }}</p>
    <p>Year: {{ $train->year }}</p>
    <p>Tipo: {{ $train->train_type->type }}</p>
</body>
</html>