<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('storage/css/profile/profile.css') }}">
    <link rel="icon" href="/storage/image/title.png" type="image/png">
    <title>Profile</title>
</head>
<body>
<div class="container">
    @if (session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    @if (!request()->has('edit'))
        {{-- MODE LIHAT PROFIL --}}
        <div class="profile-header">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}" />
            <div>
                <h2>{{ $user->name }}</h2>
                <p>{{ $user->email }}</p>
                <p>Bergabung sejak {{ $user->created_at->format('d M Y') }}</p>
            </div>
        </div>

        <div class="section">
            <h3>Tentang Saya</h3>
            <p>{{ $user->bio ?: 'Belum ada biodata.' }}</p>
        </div>

        <div class="section" style="text-align: right; margin-top: 20px;">
            <a href="{{ route('profile.show', ['edit' => true]) }}" class="btn">Edit Profil</a>
            <a href="{{ route('home') }}" class="btn" style="background-color: #6b7280;">Kembali</a>
        </div>
    @else
        {{-- MODE EDIT PROFIL --}}
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}">
                @error('name') <div style="color:red;">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}">
                @error('email') <div style="color:red;">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="bio">Biodata</label>
                <textarea id="bio" name="bio" rows="4">{{ old('bio', $user->bio) }}</textarea>
                @error('bio') <div style="color:red;">{{ $message }}</div> @enderror
            </div>
            <div class="form-actions">
                <a href="{{ route('home') }}" class="btn" style="background-color: #000000; color: white;">Kembali</a>
                <button type="submit" class="btn">Simpan Perubahan</button>
            </div>
        </form>
    @endif
</div>

</body>
</html>