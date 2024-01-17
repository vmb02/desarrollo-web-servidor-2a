<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Ticket</title>
</head>
<body>
    <form method="post" action="{{route('tickets.update', ['ticket'=>$ticket->id])}}">    
        @csrf
        {{ method_field('PUT') }}
        <label>Date: </label>
        <input type="date" name="date" value="{{ $ticket->date}}"><br><br>
        <label>Price: </label>
        <input type="number" step="0.01" name="price" value="{{ $ticket->price}}">
        <label>Train: </label>
        <select name="train_id">
            <option value="1">Cercanías</option>
            <option value="2">Media Distancia</option>
            <option value="3">Alta Velocidad</option>
        </select>
        <label>Type: </label>
        <select name="ticket_type_id">
            <option value="1">Billete sencillo</option>
            <option value="2">Abono mensual</option>
            <option value="3">Abono trimestral</option>
        </select>
        <br><br>
        <input type="submit" value="Editar">
    </form>
    
</body>
</html>