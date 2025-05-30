<h1>{{ $show->title }}</h1>

<div class="container mx-auto px-4 py-8">
  <div class="grid md:grid-cols-2 gap-8">
    <img src="{{ asset('/storage/' . $event->image) }}" alt="{{ $event->title }}" class="rounded-xl shadow-md" />

    <div>
      <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $event->title }}</h1>
      <p class="text-sm text-gray-500 mb-1">{{ $event->tanggal }} - {{ $event->lokasi }}</p>
      <p class="text-lg text-indigo-600 font-semibold mb-4">Rp {{ number_format($event->harga, 0, ',', '.') }}</p>
      <p class="mb-6">{{ $event->deskripsi }}</p>

      @auth
        <form action="{{ route('checkout.store') }}" method="POST">
          @csrf
          <input type="hidden" name="event_id" value="{{ $event->id }}">
          <button type="submit" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700">
            Beli Tiket
          </button>
        </form>
      @else
        <a href="/login" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700">
          Login untuk Beli Tiket
        </a>
      @endauth
    </div>
  </div>
</div>
@endsection
