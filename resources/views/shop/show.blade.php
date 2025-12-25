@extends('layouts.app')

@section('content')
<div class="p-6 max-w-4xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-white p-6 rounded-xl shadow">

        <img
            src="{{ $book->image
                ? asset('storage/' . $book->image)
                : asset('images/no-image.png') }}"
            class="w-full h-96 object-cover rounded-xl">

        <div>
            <h2 class="text-2xl font-bold mb-2">{{ $book->title }}</h2>
            <p class="text-gray-500 mb-1">{{ $book->author }}</p>

            <p class="text-green-600 text-xl font-bold mb-4">
                Rp {{ number_format($book->price, 0, ',', '.') }}
            </p>

            <p class="text-sm text-gray-600 mb-4">
                Stok tersedia: {{ $book->stock }}
            </p>

            <form action="{{ route('shop.buy', $book) }}" method="POST">
                @csrf
                <input type="number" name="quantity"
                       min="1"
                       max="{{ $book->stock }}"
                       value="1"
                       class="border rounded p-2 w-24 mb-4">

                <button class="block w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
                    Beli Sekarang
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
