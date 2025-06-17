<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
     <link rel="icon" href="/storage/image/title.png" type="image/png">
    <title>Register - TiketinAja</title>
    <link rel="stylesheet" href="{{ asset('storage/css/registrasi.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="{{ asset('css/registrasi.css')}}">
</head>
<body>
    <form method="POST" action="/registrasi">
    @csrf
    <h2>Buat Akun TiketinAja</h2>

    @error('name')
      <div class="text-red-500">{{ $message }}</div>
    @enderror
    <div class="input-group">
      <i data-feather="user"></i>
      <input type="text" name="name" placeholder="Nama Lengkap" required>
    </div>

    @error('email')
      <div class="text-red-500">{{ $message }}</div>
    @enderror
    <div class="input-group">
      <i data-feather="mail"></i>
      <input type="email" name="email" placeholder="Email" required>
    </div>

    @error('password')
      <div class="text-red-500">{{ $message }}</div>
    @enderror
    <div class="input-group">
      <i data-feather="lock"></i>
      <input type="password" name="password" placeholder="Password" required>
    </div>

    <div class="input-group">
      <i data-feather="lock"></i>
      <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
    </div>

    <button type="submit">Register</button>

    <p>Sudah punya akun? <a href="/login">Login</a></p>
  </form>

  <script>
    feather.replace();
  </script>
</body>
</html>
