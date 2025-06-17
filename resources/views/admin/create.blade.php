<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/storage/image/title.png" type="image/png">
    <link rel="stylesheet" href="{{ asset('storage/css/admin/create.css') }}">
    <title>ADD - TIKET</title>
</head>
<body>
    
    <form action="{{route('admin.add')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h1>MASUKAN TIKET KAMU</h1>
        <input type="text" name="title" placeholder="Nama">
        <input type="text" name="deskripsi" placeholder="Deskripsi">
        <input type="number" name="harga" placeholder="harga">
        <input type ="file" name="image" placeholder="Upload" accept="image/*">
        <button type="submit">submit</button>
        <a href="{{ route('admin.event') }}" class="btn-back">Kembali</a>
    </form>
</body>
</html>
