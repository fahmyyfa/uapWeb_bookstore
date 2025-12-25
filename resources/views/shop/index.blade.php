@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-6">🛒 Belanja Buku</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($books as $book)
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
            <img
                src="{{ $book->image
                    ? asset('storage/' . $book->image)
                    : asset('images/no-image.png') }}"
                class="h-48 w-full object-cover"
                alt="{{ $book->title }}">

            <div class="p-4 space-y-2">
                <h3 class="font-semibold text-lg">{{ $book->title }}</h3>
                <p class="text-sm text-gray-500">{{ $book->author }}</p>

                <div class="flex justify-between items-center mt-2">
                    <span class="text-green-600 font-bold">
                        Rp {{ number_format($book->price, 0, ',', '.') }}
                    </span>
                    <span class="text-xs text-gray-400">
                        Stok: {{ $book->stock }}
                    </span>
                </div>

                <a href="{{ route('shop.show', $book) }}"
                   class="block text-center mt-3 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
                    Lihat Detail
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
