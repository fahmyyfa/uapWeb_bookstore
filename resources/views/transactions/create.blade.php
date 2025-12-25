@extends('layouts.app')

@section('content')
<div class="p-8 max-w-xl">
    <h1 class="text-2xl font-bold mb-4">Transaksi Baru</h1>

    <form method="POST"
          action="{{ route('transactions.store') }}"
          class="space-y-4">
        @csrf

        <select name="book_id" class="w-full border px-3 py-2 rounded" required>
            <option value="">Pilih Buku</option>
            @foreach($books as $book)
                <option value="{{ $book->id }}">
                    {{ $book->title }} (Stok: {{ $book->stock }})
                </option>
            @endforeach
        </select>

        <input type="number"
               name="quantity"
               placeholder="Jumlah beli"
               min="1"
               class="w-full border px-3 py-2 rounded"
               required>

        <div class="flex gap-2">
            <a href="{{ route('transactions.index') }}"
               class="px-4 py-2 border rounded">
                Batal
            </a>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded">
                Simpan Transaksi
            </button>
        </div>
    </form>
</div>
@endsection
