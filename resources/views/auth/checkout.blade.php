<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('storage/css/checkout.css') }}" />
     <link rel="icon" href="/storage/image/title.png" type="image/png">
    <title>Form Pemesanan Tiket</title>
</head>
<body>
<div class="container">
   
    <img src="{{ asset('storage/' . $event->image) }}" class="event-image">
    <h2>Form Pemesanan Tiket</h2>

    <form action="{{ route('checkout.store', $event->id) }}" method="POST">
        @csrf

        <label for="name">Nama Lengkap:</label>
        <input type="text" id="name" name="name" required />

        <label for="phone">Nomor Telepon:</label>
        <input type="tel" id="phone" name="phone" required />

        <label for="email">Alamat Email:</label>
        <input type="email" id="email" name="email" required />

        <label for="payment">Jenis Pembayaran:</label>
        <select id="payment" name="payment" required>
            <option value="" disabled selected>Pilih metode pembayaran</option>
            <option value="dana">Dana</option>
            <option value="gopay">Gopay</option>
            <option value="fadipay">Fadipay</option>
            <option value="cash">Bayar di Tempat</option>
        </select>

        <div class="btn-group">
            <button type="button" class="back-btn" onclick="window.history.back()">Kembali</button>
            <button type="submit" class="submit-btn">Lanjutkan</button>
        </div>
    </form>
</div>
</body>
</html>
