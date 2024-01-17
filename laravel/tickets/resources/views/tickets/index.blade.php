<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tickets</title>
</head>
<body>
    <h2>Tickets</h2>

    <p>
        <a href="{{ route('tickets.create') }}">Crear Ticket</a>
    </p><br>

    <table border=1>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Precio</th>
                <th>Tren</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->date }}</td>
                    <td>{{ $ticket->price }}</td>
                    <td>{{ $ticket->train_id }}</td>
                    <td>{{ $ticket->ticket_type->type }}</td>
                    <td>
                        <form method="get" 
                        action="{{ route('tickets.show', ['ticket'=>$ticket->id])}}">
                            <input type="submit" value="Ver">
                        </form>
                    </td>
                    <td>
                        <form method="get" 
                        action="{{ route('tickets.edit', ['ticket'=>$ticket->id])}}">
                            <input type="submit" value="Editar">
                        </form>
                    </td>
                    <td>
                        <form method="post" 
                        action="{{ route('tickets.destroy', ['ticket'=>$ticket->id])}}">
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