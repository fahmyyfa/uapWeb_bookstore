<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | Book Kurnia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-100 to-purple-200">

<div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md">
    <h1 class="text-3xl font-bold text-indigo-600 text-center">Register</h1>
    <p class="text-center text-gray-500 mb-6">Buat akun admin baru</p>

    {{-- Error validation --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/register" class="space-y-4">
        @csrf

        <div>
            <input type="text" name="name" placeholder="Nama Lengkap"
                value="{{ old('name') }}"
                class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                required>
        </div>

        <div>
            <input type="email" name="email" placeholder="Email"
                value="{{ old('email') }}"
                class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                required>
        </div>

        <div>
            <input type="password" name="password" placeholder="Password"
                class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                required>
        </div>

        <button type="submit"
            class="w-full bg-indigo-600 text-white py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">
            Daftar
        </button>
    </form>

    <p class="text-center text-sm mt-6 text-gray-600">
        Sudah punya akun?
        <a href="/login" class="text-indigo-600 font-semibold hover:underline">
            Login
        </a>
    </p>
</div>

</body>
</html>
