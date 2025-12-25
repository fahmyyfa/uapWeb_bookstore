<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Book Kurnia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-300">

<div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md">
    <h1 class="text-3xl font-bold text-blue-600 text-center">Book Kurnia</h1>
    <p class="text-center text-gray-500 mb-6">Admin Dashboard Login</p>

    {{-- Success message --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Login error --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="/login" class="space-y-4">
        @csrf

        <div>
            <input type="email" name="email" placeholder="Email"
                value="{{ old('email') }}"
                class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                required>
        </div>

        <div>
            <input type="password" name="password" placeholder="Password"
                class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                required>
        </div>

        <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
            Login
        </button>
    </form>

    <p class="text-center text-sm mt-6 text-gray-600">
        Belum punya akun?
        <a href="/register" class="text-blue-600 font-semibold hover:underline">
            Daftar
        </a>
    </p>
</div>

</body>
</html>
