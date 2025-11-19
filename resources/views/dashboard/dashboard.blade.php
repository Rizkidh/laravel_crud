<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .dashboard {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .stat-card {
            background: #007bff;
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            min-width: 150px;
            margin: 10px;
        }

        .stat-card h2 {
            margin: 0;
            font-size: 2em;
        }

        .stat-card p {
            margin: 5px 0 0;
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <div class="header">
            <h1>Dashboard Pengguna</h1>
            <p>Selamat datang di panel kontrol pengguna.</p>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>

        <div class="stats">
            <div class="stat-card">
                <h2 id="user-count">0</h2>
                <p>Jumlah Pengguna</p>
            </div>
            <div class="stat-card">
                <h2 id="task-count">0</h2>
                <p>Jumlah Task</p>
            </div>
            <!-- Tambahkan kartu lain jika diperlukan -->
        </div>
    </div>

    <script>
        const userCount = '{{ $totalusers }}';
        document.getElementById('user-count').textContent = userCount.toLocaleString();

        const taskCount = '{{ $totaltask }}';
        document.getElementById('task-count').textContent = taskCount.toLocaleString();
    </script>
</body>

</html>
