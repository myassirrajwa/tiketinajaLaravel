
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('storage/css/admin/admin.css') }}">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <a href="#">Dashboard</a>
            <a href="#">Kelola Pengguna</a>
            <a href="#">Acara & Tiket</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" style="color: #e74c3c; margin-top: 10px;">Logout</button>
            </form>
        </div>

        <!-- Main Content -->
        <div class="main">
            <h1>Selamat Datang, Admin!</h1>

            <div class="card">
                <h3>Total Pengguna</h3>
                <p>152</p>
            </div>

            <div class="card">
                <h3>Total Acara</h3>
                <p>34</p>
            </div>

            <div class="card">
                <h3>Tiket Terjual</h3>
                <p>879</p>
            </div>
        </div>
    </div>
</body>
</html>
