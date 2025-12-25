<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Book Kurnia') }}</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Alpine.js (WAJIB untuk alert animasi) --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    @auth
        @include('layouts.sidebar')
    @endauth

    {{-- MAIN --}}
    <div class="flex-1 flex flex-col">

        {{-- NAVBAR --}}
        @auth
            @include('layouts.navbar')
        @endauth

        {{-- CONTENT --}}
        <main class="flex-1 p-6">
            <div class="max-w-7xl mx-auto">

                {{-- GLOBAL ALERT --}}
                <x-alert />

                {{-- PAGE CONTENT --}}
                @yield('content')

            </div>
        </main>

    </div>
</div>

</body>
</html>
