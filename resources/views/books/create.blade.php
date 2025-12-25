@extends('layouts.app')

@section('content')
<div class="p-6 max-w-xl">
    <h2 class="text-xl font-bold mb-4">📚 Tambah Buku</h2>

    <form action="{{ route('books.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white p-6 rounded-xl shadow space-y-4">

        @csrf

        <div>
            <label class="block mb-1 font-medium">Kategori</label>
            <select name="category_id" class="w-full border rounded p-2">
                @foreach($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium">Judul</label>
            <input type="text" name="title" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Penulis</label>
            <input type="text" name="author" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Harga</label>
            <input type="number" name="price" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Stok</label>
            <input type="number" name="stock" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Gambar Buku</label>
            <input type="file" name="image"
                   class="w-full border rounded p-2"
                   accept="image/*">
            <p class="text-xs text-gray-500 mt-1">JPG / PNG (max 2MB)</p>
        </div>

        <div class="flex gap-2">
            <a href="{{ route('books.index') }}"
               class="px-4 py-2 border rounded">Batal</a>

            <button class="px-4 py-2 bg-indigo-600 text-white rounded">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
