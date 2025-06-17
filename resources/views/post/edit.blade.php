<link rel="stylesheet" href="{{ asset('storage/css/post/update.css') }}">
<form action="{{ route('post.update', $post->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div>
    <label for="title">Judul</label><br>
    <input type="text" name="title" id="title" value="{{ $post->title }}" required>
    @error('title')
      <p style="color:red;">{{ $message }}</p>
    @enderror
  </div>
  <div>
    <label for="body">Isi</label><br>
    <textarea name="body" id="body" rows="5" required>{{$post ->body}}</textarea>
    @error('body')
      <p style="color:red;">{{ $message }}</p>
    @enderror
  </div>
  <button type="submit">Simpan</button>
</form>
