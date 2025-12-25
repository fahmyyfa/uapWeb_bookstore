@extends('layouts.app')

@section('content')
<div class="p-8 max-w-xl">
    <h1 class="text-2xl font-bold mb-6">Edit Kategori</h1>

    @if($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Nama Kategori</label>
            <input type="text"
                   name="name"
                   value="{{ old('name', $category->name) }}"
                   class="w-full border rounded px-4 py-2"
                   required>
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('categories.index') }}"
               class="px-4 py-2 border rounded">
                Batal
            </a>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
