<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - TiketinAja</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/registrasi.css')}}">
</head>
<body>
    <form method="POST" action="/registrasi">
        @csrf
        <h2>Buat Akun TiketinAja</h2>

        @error('name')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
        @error('email')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
        @error('password')
            <div class="text-red-500">{{ $message }}</div>
        @enderror

        <input type="text" name="name" placeholder="Nama Lengkap" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

        <button type="submit">Register</button>

        <p>Sudah punya akun? <a href="/login">Login</a></p>
    </form>
</body>
</html>
