@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">🛒 Toko Buku</h1>

@if($books->isEmpty())
    <div class="rounded-lg bg-yellow-100 text-yellow-700 px-4 py-3">
        Belum ada buku tersedia.
    </div>
@else
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($books as $book)
            <div class="bg-white rounded shadow p-4">
                <h2 class="font-semibold text-lg">{{ $book->title }}</h2>
                <p class="text-sm text-gray-500">{{ $book->category->name }}</p>
                <p class="mt-2 font-bold">Rp {{ number_format($book->price) }}</p>
                <p class="text-sm">Stok: {{ $book->stock }}</p>

                <a href="{{ route('shop.show', $book) }}"
                   class="inline-block mt-3 bg-indigo-600 text-white px-4 py-2 rounded">
                    Detail
                </a>
            </div>
        @endforeach
    </div>
@endif
@endsection
