<form action="{{route('event.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h1>MASUKAN TIKET KAMU</h1>
    <input type="text" name="title" placeholder="Nama">
    <input type="text" name="deskripsi" placeholder="Deskripsi">
    <input type="number" name="harga" placeholder="harga">

    <label for="kategori">Kategori</label>
    <select name="kategori" id="kategori" required>
    <option value=""> Pilih Kategori </option>
    <option value="musik">Musik</option>
    <option value="seni">Seni</option>
    <option value="olahraga">Olahraga</option>
    <option value="film">Film</option>
    <option value="wisata">Wisata</option>
    </select>

    <input type ="file" name="image" placeholder="Upload" accept="image/*">
    <button type="submit">submit</button>
</form>
