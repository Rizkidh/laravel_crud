<!DOCTYPE html>
<html>
<head>
    <title>Daftar Users</title>
</head>
<body>

<h1>Daftar Users</h1>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Dibuat Pada</th>
    </tr>

    @foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->created_at }}</td>
    </tr>
    @endforeach

</table>

<br>
<a href="/users/create">Tambah User Baru</a>

</body>
</html>
