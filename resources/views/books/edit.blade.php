@extends('layouts.app')

@section('content')
<div class="p-8 max-w-xl">
    <h1 class="text-2xl font-bold mb-4">Edit Buku</h1>

    <form method="POST"
          action="{{ route('books.update', $book) }}"
          class="space-y-4">
        @csrf
        @method('PUT')

        <select name="category_id" class="w-full border px-3 py-2 rounded">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}"
                    @selected($book->category_id == $cat->id)>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>

        <input type="text" name="title"
               value="{{ $book->title }}"
               class="w-full border px-3 py-2 rounded">

        <input type="text" name="author"
               value="{{ $book->author }}"
               class="w-full border px-3 py-2 rounded">

        <input type="number" name="price"
               value="{{ $book->price }}"
               class="w-full border px-3 py-2 rounded">

        <input type="number" name="stock"
               value="{{ $book->stock }}"
               class="w-full border px-3 py-2 rounded">

        <div class="flex gap-2">
            <a href="{{ route('books.index') }}"
               class="px-4 py-2 border rounded">Batal</a>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
