<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <br>
    <div class="container" style="background-color: lightgrey; border-radius:1rem">
        <br>
        <h2 style="color:rgb(0, 141, 12)">Editar Ticket</h2><br>
        <form method="post" action="{{route('tickets.update', ['ticket'=>$ticket->id])}}">    
            @csrf
            {{ method_field('PUT') }}
            <label>Date: </label>
            <input type="date" name="date" value="{{ $ticket->date}}"><br><br>
            <label>Price: </label>
            <input type="number" step="0.01" name="price" value="{{ $ticket->price}}">
            <label>Train: </label>
            <select name="train_id">
                @foreach ($trains as $train)
                    <option value="{{ $train->id }}">{{ $train->name }}</option>
                @endforeach
            </select>
            <label>Type: </label>
            <select name="ticket_type_id">
                @foreach ($tickets_types as $ticket_type)
                    <option value="{{ $ticket_type->id }}">{{ $ticket_type->type }}</option>
                @endforeach
            </select>
            <br><br>
            <input class="btn btn-success" type="submit" value="Editar">
        </form>
        <br>
    </div>
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>