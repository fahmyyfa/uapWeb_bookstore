<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Book Kurnia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex">
    {{-- SIDEBAR --}}
    @include('layouts.sidebar')

    {{-- MAIN --}}
    <main class="flex-1 min-h-screen">
        {{-- HEADER --}}
        <header class="bg-white shadow px-6 py-4 flex items-center justify-between">
            <div>
                {{-- Breadcrumb sederhana --}}
                <nav class="text-sm text-gray-500">
                    <span class="font-medium text-gray-700">
                        {{ request()->path() === '/' ? 'Home' : ucfirst(str_replace('-', ' ', request()->path())) }}
                    </span>
                </nav>
            </div>

            <div class="flex items-center gap-3">
                {{-- Badge Role --}}
                @php $role = auth()->user()->isAdmin() ? 'Admin' : 'User'; @endphp
                <span class="px-3 py-1 rounded-full text-xs font-semibold
                    {{ $role === 'Admin' ? 'bg-blue-100 text-blue-700' : 'bg-green-100 text-green-700' }}">
                    {{ $role }}
                </span>

                <span class="text-sm text-gray-600">
                    {{ auth()->user()->name }}
                </span>
            </div>
        </header>

        {{-- CONTENT --}}
        <section class="p-6">
            {{-- ALERT GLOBAL --}}
            @if(session('success'))
                <div class="mb-4 rounded-lg bg-green-100 text-green-700 px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 rounded-lg bg-red-100 text-red-700 px-4 py-3">
                    {{ $errors->first() }}
                </div>
            @endif

            @yield('content')
        </section>
    </main>
</div>

</body>
</html>
