<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
     <link rel="icon" href="/storage/image/title.png" type="image/png">
    <title>Checkout Berhasil</title>
</head>
<body>
    <h1>Terima kasih!</h1>
    <p>{{ session('message') }}</p>
    <a href="{{ url('/') }}">Kembali ke Beranda</a>
</body>
</html>

