@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">📚 Daftar Buku</h1>
    <a href="{{ route('books.create') }}"
       class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
        + Tambah Buku
    </a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
@forelse($books as $book)
    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
        <div class="h-48 bg-gray-100">
            <img
                src="{{ $book->image ? asset('storage/'.$book->image) : 'https://via.placeholder.com/300x400?text=No+Image' }}"
                class="w-full h-full object-cover"
                alt="{{ $book->title }}"
            />
        </div>

        <div class="p-4">
            <h3 class="font-semibold text-lg line-clamp-2">{{ $book->title }}</h3>
            <p class="text-sm text-gray-500 mb-2">{{ $book->author }}</p>

            <div class="flex items-center justify-between">
                <span class="font-bold text-blue-600">
                    Rp {{ number_format($book->price,0,',','.') }}
                </span>
                <span class="text-xs text-gray-500">
                    Stok: {{ $book->stock }}
                </span>
            </div>

            <div class="mt-4 flex gap-2">
                <a href="{{ route('books.edit',$book) }}"
                   class="flex-1 text-center text-sm px-3 py-2 rounded bg-gray-100 hover:bg-gray-200">
                    Edit
                </a>
                <form method="POST" action="{{ route('books.destroy',$book) }}">
                    @csrf @method('DELETE')
                    <button class="text-sm px-3 py-2 rounded bg-red-100 text-red-600 hover:bg-red-200">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
@empty
    <p class="text-gray-500">Belum ada buku.</p>
@endforelse
</div>
@endsection
