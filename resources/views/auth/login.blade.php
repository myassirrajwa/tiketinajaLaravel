<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
     <link rel="icon" href="/storage/image/title.png" type="image/png">
    <title>Login - TiketinAja</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Quicksand', sans-serif;
            background: linear-gradient(to right, #1c1c1e, #2c2c2e); /* Dark soft background */
            background-image: url('/storage/image/pink_beach.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            background-color: rgba(0, 0, 0, 0.6); /* transparan gelap */
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
            animation: fadeIn 0.8s ease-out;
            color: #fff;
        }

        h2 {
            text-align: center;
            font-size: 1.75rem;
            margin-bottom: 1.5rem;
            color: #f39c12;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            border: none;
            border-radius: 5px;
            background-color: #f1f1f1;
            font-size: 1rem;
            color: #2c2c2e;
        }

        input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(243, 156, 18, 0.3);
        }

        .text-red-500 {
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            color: #ff6b6b;
        }

        button[type="submit"] {
            width: 100%;
            padding: 0.75rem;
            background-color: #f39c12;
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e67e22;
        }

        p {
            text-align: center;
            font-size: 0.875rem;
            margin-top: 1rem;
            color: #ccc;
        }

        a {
            color: #f39c12;
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <form method="POST" action="/login">
        @csrf
        <h2>Masuk ke TiketinAja</h2>

        @error('email')
            <div class="text-red-500">{{ $message }}</div>
        @enderror

        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Kata Sandi" required>

        <button type="submit">Login</button>

        <p>Belum punya akun? <a href="/registrasi">Daftar sekarang</a></p>
    </form>
</body>
</html>
