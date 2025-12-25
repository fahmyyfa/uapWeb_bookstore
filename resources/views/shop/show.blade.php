@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 px-4 py-3 rounded">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="bg-white shadow rounded p-6">
        <h2 class="text-2xl font-bold mb-2">{{ $book->title }}</h2>
        <p class="text-gray-600">{{ $book->category->name }}</p>

        <p class="mt-4">Harga: <strong>Rp {{ number_format($book->price) }}</strong></p>
        <p>Stok tersedia: {{ $book->stock }}</p>

        <form method="POST" action="{{ route('shop.buy', $book) }}" class="mt-6 space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-semibold mb-1">Jumlah</label>
                <input type="number"
                       name="quantity"
                       min="1"
                       max="{{ $book->stock }}"
                       required
                       class="w-full border rounded px-3 py-2">
            </div>

            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Beli Sekarang
            </button>
        </form>
    </div>
</div>
@endsection
