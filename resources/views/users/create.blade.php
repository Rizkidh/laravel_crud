<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
</head>
<body>

<h1>Tambah User</h1>

@if (session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

@if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/users" method="POST">
    @csrf

    <label>Nama</label><br>
    <input type="text" name="name" value="{{ old('name') }}"><br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="{{ old('email') }}"><br><br>

    <label>Password</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>
