<aside class="w-64 bg-white border-r min-h-screen">

    {{-- LOGO --}}
    <div class="p-6 border-b text-center">
        <h1 class="text-2xl font-bold text-blue-600">Book Kurnia</h1>
        <p class="text-xs text-gray-500 mt-1">
            {{ auth()->user()->role === 'admin' ? 'Admin Dashboard' : 'Customer Area' }}
        </p>
    </div>

    {{-- NAV --}}
    <nav class="p-4 space-y-2 text-sm">

        {{-- ADMIN MENU --}}
        @if(auth()->user()->role === 'admin')

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
               {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700 font-semibold border-l-4 border-blue-600' : 'hover:bg-gray-100 text-gray-700' }}">
                📊 <span>Dashboard</span>
            </a>

            <a href="{{ route('categories.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
               {{ request()->routeIs('categories.*') ? 'bg-blue-50 text-blue-700 font-semibold border-l-4 border-blue-600' : 'hover:bg-gray-100 text-gray-700' }}">
                🗂️ <span>Kategori</span>
            </a>

            <a href="{{ route('books.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
               {{ request()->routeIs('books.*') ? 'bg-blue-50 text-blue-700 font-semibold border-l-4 border-blue-600' : 'hover:bg-gray-100 text-gray-700' }}">
                📚 <span>Buku</span>
            </a>

            <a href="{{ route('transactions.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
               {{ request()->routeIs('transactions.index') ? 'bg-blue-50 text-blue-700 font-semibold border-l-4 border-blue-600' : 'hover:bg-gray-100 text-gray-700' }}">
                🧾 <span>Transaksi</span>
            </a>

        @endif

        {{-- USER MENU --}}
        @if(auth()->user()->role === 'user')

            <a href="{{ route('shop.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
               {{ request()->routeIs('shop.*') ? 'bg-green-50 text-green-700 font-semibold border-l-4 border-green-600' : 'hover:bg-gray-100 text-gray-700' }}">
                🛒 <span>Belanja Buku</span>
            </a>

            <a href="{{ route('transactions.user') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
               {{ request()->routeIs('transactions.user') ? 'bg-green-50 text-green-700 font-semibold border-l-4 border-green-600' : 'hover:bg-gray-100 text-gray-700' }}">
                📦 <span>Riwayat Pembelian</span>
            </a>

        @endif

    </nav>

    {{-- FOOTER --}}
    <div class="absolute bottom-0 w-64 border-t p-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                class="w-full flex items-center justify-center gap-2 px-4 py-2 text-sm rounded-lg
                       bg-red-50 text-red-600 hover:bg-red-100 transition">
                🚪 Logout
            </button>
        </form>
    </div>

</aside>
