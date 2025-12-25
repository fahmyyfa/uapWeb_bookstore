@extends('layouts.app')

@section('content')
<div class="p-8 max-w-xl">
    <h1 class="text-2xl font-bold mb-4">Tambah Buku</h1>

    <form method="POST" action="{{ route('books.store') }}" class="space-y-4">
        @csrf

        <select name="category_id" class="w-full border px-3 py-2 rounded" required>
            <option value="">Pilih Kategori</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>

        <input type="text" name="title" placeholder="Judul Buku"
               class="w-full border px-3 py-2 rounded" required>

        <input type="text" name="author" placeholder="Penulis"
               class="w-full border px-3 py-2 rounded" required>

        <input type="number" name="price" placeholder="Harga"
               class="w-full border px-3 py-2 rounded" required>

        <input type="number" name="stock" placeholder="Stok"
               class="w-full border px-3 py-2 rounded" required>

        <div class="flex gap-2">
            <a href="{{ route('books.index') }}"
               class="px-4 py-2 border rounded">Batal</a>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
