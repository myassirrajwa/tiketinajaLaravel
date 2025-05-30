<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TiketinAja - Pesan Tiket Event Anda</title>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/storage/css/landing_page.css')}}">
</head>
<body>
  <!-- Header -->
  <header>
    <h1>TiketinAja</h1>
    <nav>
      <a href="#search">Cari Tiket</a>
      <a href="#events">Event</a>
      <a href="#cta">Daftar</a>
    </nav>
   @auth
    <div class="user-section">
    @php
        $user = Auth::user();
        $initial = strtoupper(substr($user ->name,0,1));
    @endphp
    <div class="avatar">
      {{ $initial }}
    </div>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="login-btn">Logout</button>
      </form>
    </div>
    @else
    <a href="/login"><butto class="login-btn">Login</butto></a>
    @endauth
  </header>

  <!-- Hero Section -->
  <section class="hero">
    <div>
      @auth
      <h2>Hallo {{$user->name}} pamerkan tiket mu!</h2>
      <a href="{{route('event.store')}}" class="cta-btn">pamerkan !</a>
        @else
      <h2>Pamerkan tiket yang ingin dijual</h2>
      <a href="#search" class="cta-btn">Cari Tiket</a>
      @endauth
    </div>
  </section>

  <!-- Search Section -->
  <section id="search" class="search-section">
    <input type="text" placeholder="Cari acara, konser, atau destinasi..." />
    <select>
      @foreach(['musik', 'seni', 'olahraga', 'film','wisata'] as $kategori)
              <option value="{{$kategori}}">
                <a href="{{ route('home', ['kategori' => $kategori]) }}"
                   class="block bg-indigo-100 text-indigo-700 text-center py-6 rounded-xl shadow-sm hover:shadow-md capitalize transition">
                    {{ $kategori }}
                </a>
              </option>
      @endforeach
    </select>
    <button>Cari</button>
  </section>

  <!-- Featured Events Section -->
  <section id="events" class="featured-events  block">  
  @foreach ($events as $event )
    <div class="event-card">
  <img src="{{ asset("/storage/" . $event->image)}}" alt="{{ $event->title }}" />
  <div class="info">
    <h3>{{ $event->title }}</h3>
    <p>{{ $event->deskripsi }}</p>
    <p>IDR {{ number_format($event->harga, 0, ',', '.') }}</p>
    <a href="{{ route('auth.show', $show->slug) }}" class="btn-beli">BELI</a>
  </div>
</div>

    </div>
    @endforeach
    
    </section>

  <!-- Call to Action Section -->
  @auth
  
  @else
  <section id="cta" class="cta-section">
    <h3>Gabung Sekarang & Temukan Event Favoritmu!</h3>
    <a href="#">Daftar Gratis</a>
  </section>
  @endauth

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 TiketinAja. Semua Hak Dilindungi.</p>
  </footer>

</body>
</html>
