<header class="bg-white shadow px-6 py-4 flex justify-between items-center">
    <!-- Judul halaman -->
    <h2 class="text-lg font-semibold text-gray-800">
        @if(auth()->user()->role === 'admin')
            Admin Dashboard
        @else
            Customer Area
        @endif
    </h2>

    <!-- Info user -->
    <div class="flex items-center gap-3">
        <!-- Role label -->
        <span class="text-sm text-gray-600">
            @if(auth()->user()->role === 'admin')
                Admin
            @else
                User
            @endif
        </span>

        <!-- Avatar -->
        <div class="w-9 h-9 rounded-full bg-blue-500 text-white flex items-center justify-center font-semibold">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>
    </div>
</header>
