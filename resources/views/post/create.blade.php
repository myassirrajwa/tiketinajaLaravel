<link rel="stylesheet" href="{{ asset('storage/css/post/update.css') }}">
<form action="{{ route('admin.store') }}" method="POST">
  @csrf
  <div>
    <label for="title">Judul</label><br>
    <input type="text" name="title" id="title" value="{{ old('title') }}" required>
    @error('title')
      <p style="color:red;">{{ $message }}</p>
    @enderror
  </div>
  <div>
    <label for="body">Isi</label><br>
    <textarea name="body" id="body" rows="5" required>{{ old('body') }}</textarea>
    @error('body')
      <p style="color:red;">{{ $message }}</p>
    @enderror
  </div>
  <button type="submit">Simpan</button>
</form>

