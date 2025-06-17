<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="icon" href="/storage/image/title.png" type="image/png">
    <title>admin - edit </title>
    <link rel="stylesheet" href="{{ asset('/storage/css/admin/edit.css')}}">
</head>
<body>
    <form action="{{ route('admin.update', $event->id) }}" method="post" enctype="multipart/form-data" class="edit-form">
        @csrf
        @method('PUT') 
        <h1>UPDATE TIKET</h1>
    
        <input type="text" name="title" placeholder="Nama" value="{{ old('title', $event->title) }}">
        <input type="text" name="deskripsi" placeholder="Deskripsi" value="{{ old('deskripsi', $event->deskripsi) }}">
        <input type="number" name="harga" placeholder="Harga" value="{{ old('harga', $event->harga) }}">
        
        <input type="file" name="image" accept="image/*">
    
        @if($event->image)
            <p>Gambar Saat Ini:</p>
            <img src="{{ asset('storage/' . $event->image) }}" alt="Gambar Event" width="150">
        @endif
    
        <button type="submit">Update</button>
    </form>
</body>
</html>