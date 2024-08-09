<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th>Location</th>
            <th>Participants</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $holidays as $holiday)
        <tr>
            <td>{{ $holiday['title'] }}</td>
            <td>{{ $holiday['description'] }}</td>
            <td>{{ $holiday['date'] }}</td>
            <td>{{ $holiday['location'] }}</td>
            <td>{{ $holiday['participants'] }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
