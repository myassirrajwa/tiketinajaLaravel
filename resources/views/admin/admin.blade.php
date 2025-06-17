
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
     <link rel="icon" href="/storage/image/title.png" type="image/png">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('storage/css/admin/admin.css') }}">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <a href="#">Dashboard</a>
            <a href="{{route('admin.event')}}">Acara & Tiket</a>
            <a href="{{ route('home') }}" class="btn-bottom-left">
    Back to Home
</a>
        </div>

        <!-- Main Content -->
        <div class="main">
            <h1>Selamat Datang,{{$user->name}}</h1>

            <div class="card">
                <h3>Total Pengguna</h3>
                <p>{{$totalUser}}</p>
            </div>

            <div class="card">
                <h3>Total Event</h3>
                <p>{{$totalEvent}}</p>
            </div>
        </div>
    </div>
</body>
</html>
