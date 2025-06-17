<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="icon" href="/storage/image/title.png" type="image/png">
    <link rel="stylesheet" href="{{ asset('storage/css/admin/admin.css') }}">
    <title>Data-Tiket</title>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <a href="{{route('admin')}}">Dashboard</a>
            <a href="#">Kelola Pengguna</a>
            <a href="{{route('admin.create')}}">Acara & Tiket</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" style="color: #e74c3c; margin-top: 10px;">Logout</button>
            </form>
        </div>

        <!-- Main Content -->
        <div class="main">
            <h1>Data Tiket</h1>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($event as $konten)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $konten->title }}</td>
                        <td>{{ $konten->deskripsi }}</td>
                        <td>{{ number_format($konten->harga, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('admin.edit', $konten->id) }}">Edit</a>

                        </td>
                        <td>
                            <form action="{{ route('admin.destroy', $konten->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tombol Tambah Tiket -->
            <div style="margin-top: 20px;">
                <a href="{{ route('admin.create') }}" class="add-button">+ Tambah Tiket</a>
            </div>
        </div>
    </div>
</body>
</html>
