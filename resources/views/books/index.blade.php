@extends('layouts.app')

@section('content')
<div class="p-8">
    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Data Buku</h1>
        <a href="{{ route('books.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded">
            + Tambah Buku
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full bg-white shadow rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">Judul</th>
                <th class="px-4 py-2">Kategori</th>
                <th class="px-4 py-2">Penulis</th>
                <th class="px-4 py-2">Harga</th>
                <th class="px-4 py-2">Stok</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $book->title }}</td>
                <td class="px-4 py-2">{{ $book->category->name }}</td>
                <td class="px-4 py-2">{{ $book->author }}</td>
                <td class="px-4 py-2">Rp {{ number_format($book->price) }}</td>
                <td class="px-4 py-2">{{ $book->stock }}</td>
                <td class="px-4 py-2 flex gap-2">
                    <a href="{{ route('books.edit', $book) }}"
                       class="bg-yellow-400 px-3 py-1 rounded text-white">
                        Edit
                    </a>
                    <form action="{{ route('books.destroy', $book) }}"
                          method="POST">
                        @csrf @method('DELETE')
                        <button class="bg-red-500 px-3 py-1 rounded text-white"
                                onclick="return confirm('Hapus buku?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
