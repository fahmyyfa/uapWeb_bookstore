@extends('layouts.app')

@section('content')
<div class="space-y-10">

    <!-- ================= HERO / INTRO TOKO ================= -->
    <section class="relative bg-gradient-to-r from-indigo-600 to-blue-500 rounded-2xl p-8 text-white overflow-hidden">
        <div class="relative z-10 max-w-2xl">
            <h1 class="text-3xl md:text-4xl font-extrabold mb-3">
                📚 Selamat Datang di Book Kurnia
            </h1>
            <p class="text-white/90 mb-6 leading-relaxed">
                Temukan buku pilihan terbaik untuk meningkatkan wawasan, skill,
                dan inspirasi hidup Anda. Kurasi khusus, harga terjangkau.
            </p>
            <a href="#produk"
               class="inline-block bg-white text-indigo-600 font-semibold px-6 py-3 rounded-xl shadow hover:scale-105 transition">
                Jelajahi Buku
            </a>
        </div>

        <!-- Decorative -->
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/10 rounded-full"></div>
        <div class="absolute -left-10 -top-10 w-40 h-40 bg-white/10 rounded-full"></div>
    </section>

    <!-- ================= SECTION TERPOPULER ================= -->
    <section>
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold">
                🔥 Rekomendasi Populer
            </h2>
            <span class="text-sm text-gray-500">
                Pilihan terbaik minggu ini
            </span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($books as $book)
            <div
                class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition overflow-hidden flex flex-col"
            >
                <!-- IMAGE -->
                <div class="relative h-56 overflow-hidden">
                    <img
                        src="{{ $book->image ? asset('storage/'.$book->image) : 'https://placehold.co/600x400?text=Book+Cover' }}"
                        alt="{{ $book->title }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                    />

                    <!-- Badge stok -->
                    <span
                        class="absolute top-3 left-3 px-3 py-1 text-xs rounded-full
                        {{ $book->stock > 0 ? 'bg-green-600' : 'bg-red-600' }} text-white"
                    >
                        {{ $book->stock > 0 ? 'Tersedia' : 'Habis' }}
                    </span>
                </div>

                <!-- CONTENT -->
                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="font-bold text-lg mb-1 line-clamp-2">
                        {{ $book->title }}
                    </h3>

                    <p class="text-sm text-gray-500 mb-3">
                        {{ $book->author }}
                    </p>

                    <div class="flex items-center justify-between mt-auto">
                        <div>
                            <p class="text-green-600 font-extrabold text-lg">
                                Rp {{ number_format($book->price, 0, ',', '.') }}
                            </p>
                            <p class="text-xs text-gray-400">
                                Stok: {{ $book->stock }}
                            </p>
                        </div>

                        <a href="{{ route('shop.show', $book) }}"
                           class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2 rounded-xl
                                  hover:bg-indigo-700 transition">
                            Detail
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- ================= TRUST SECTION ================= -->
    <section class="bg-gray-50 rounded-2xl p-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
            <div class="bg-white rounded-xl p-6 shadow">
                <div class="text-3xl mb-2">📦</div>
                <h4 class="font-bold mb-1">Pembayaran Aman</h4>
                <p class="text-sm text-gray-500">
                    Proses transaksi diverifikasi admin
                </p>
            </div>

            <div class="bg-white rounded-xl p-6 shadow">
                <div class="text-3xl mb-2">🚚</div>
                <h4 class="font-bold mb-1">Cepat & Transparan</h4>
                <p class="text-sm text-gray-500">
                    Status pembelian jelas & realtime
                </p>
            </div>

            <div class="bg-white rounded-xl p-6 shadow">
                <div class="text-3xl mb-2">⭐</div>
                <h4 class="font-bold mb-1">Kurasi Berkualitas</h4>
                <p class="text-sm text-gray-500">
                    Buku pilihan terbaik untuk Anda
                </p>
            </div>
        </div>
    </section>

</div>
@endsection
