<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Tickets</title>
</head>
<body>
    <h1>Ver Ticket</h1>
    <p>Date: {{ $ticket->date }}</p>
    <p>Price: {{ $ticket->price }}</p>
    <p>Tren: {{ $ticket->train_id }}</p>
    <p>Tipo: {{ $ticket->ticket_type->type }}</p>
</body>
</html>