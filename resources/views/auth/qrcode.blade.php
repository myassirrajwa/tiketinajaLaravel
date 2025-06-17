<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/storage/image/title.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Berhasil Dipesan</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        h2 {
            color: #4CAF50;
            margin-bottom: 10px;
        }

        p {
            color: #444;
            margin-bottom: 15px;
        }

        .qr-container {
            margin: 20px 0;
        }

        a.back-button {
            display: inline-block;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        a.back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Terima kasih, {{ $checkout->name }}!</h2>
        <p>Tiketmu untuk event ID <strong>{{ $checkout->event_id }}</strong> telah berhasil dipesan.</p>
        <p>Silakan tunjukkan QR Code ini saat datang ke acara:</p>

        <div class="qr-container">
            {!! $qrCode !!}
        </div>

        <a href="{{ route('home') }}" class="back-button">Kembali ke Beranda</a>
    </div>
</body>
</html>
