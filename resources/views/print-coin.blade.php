<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Coin</title>
    <style>
        .table-data {
            border-collapse: collapse;
            width: 100%;
        }
        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            padding: 10px 20px;
            text-align: center;
        }
        .table-data tr th {
            background-color: #2c3e50;
            color: white;
        }
        .table-data tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table-data tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h3>Data Coin</h3>
    <table class="table-data">
        <thead>
            <tr>
                <th>ID</th>
                <th>Crypto</th>
                <th>Image</th>
                <th>Stands</th>
                <th>Endpoint</th>
            </tr>
        </thead>
        <tbody>
            @if($coins->count() == 0)
            <tr>
                <td colspan="6">No coins found</td>
            </tr>
            @endif
            @foreach ($coins as $coin)
            <tr>
                <td>{{ $coin['id'] }}</td>
                <td>{{ $coin['name'] }}</td>
                <td><img src="{{ asset('storage/' . $coin['image']) }}" alt="{{ $coin['name'] }}" width="50"></td>
                <td>{{ $coin['stands'] }}</td>
                <td>{{ $coin['api_endpoint'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>