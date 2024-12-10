<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data User</title>
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
    <h3>Data User</h3>
    <table class="table-data">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Registered At</th>
            </tr>
        </thead>
        <tbody>
            @if($users->count() == 0)
            <tr>
                <td colspan="5">No users found</td>
            </tr>
            @endif
            @foreach ($users as $user)
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['role'] == 1 ? 'Admin' : 'User' }}</td>
                <td>{{ $user['created_at'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>