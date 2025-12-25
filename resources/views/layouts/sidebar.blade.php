<aside class="w-64 bg-white shadow-xl min-h-screen">
    <div class="p-6 text-center border-b">
        <h1 class="text-2xl font-bold text-blue-600">Book Kurnia</h1>
        <p class="text-sm text-gray-500">
            {{ auth()->user()->isAdmin() ? 'Admin Dashboard' : 'User Panel' }}
        </p>
    </div>

    <nav class="p-4 space-y-2">

        {{-- ADMIN --}}
        @if(auth()->user()->isAdmin())
            <a href="{{ route('dashboard') }}"
               class="block px-4 py-3 rounded-lg {{ request()->is('dashboard') ? 'bg-blue-50 text-blue-600 font-semibold' : 'hover:bg-blue-50' }}">
                📊 Dashboard
            </a>

            <a href="{{ route('books.index') }}"
               class="block px-4 py-3 rounded-lg {{ request()->is('books*') ? 'bg-blue-50 text-blue-600 font-semibold' : 'hover:bg-blue-50' }}">
                📚 Buku
            </a>

            <a href="{{ route('transactions.index') }}"
               class="block px-4 py-3 rounded-lg {{ request()->is('transactions') ? 'bg-blue-50 text-blue-600 font-semibold' : 'hover:bg-blue-50' }}">
                🧾 Transaksi
            </a>
        @endif

        {{-- USER --}}
        @if(!auth()->user()->isAdmin())
            <a href="{{ route('shop.index') }}"
               class="block px-4 py-3 rounded-lg {{ request()->is('shop*') ? 'bg-blue-50 text-blue-600 font-semibold' : 'hover:bg-blue-50' }}">
                🛒 Toko Buku
            </a>

            <a href="{{ route('transactions.user') }}"
               class="block px-4 py-3 rounded-lg {{ request()->is('my-transactions') ? 'bg-blue-50 text-blue-600 font-semibold' : 'hover:bg-blue-50' }}">
                📦 Riwayat Pembelian
            </a>
        @endif

        <form method="POST" action="{{ route('logout') }}" class="pt-4 border-t">
            @csrf
            <button class="w-full text-left px-4 py-3 rounded-lg text-red-600 hover:bg-red-50">
                🚪 Logout
            </button>
        </form>
    </nav>
</aside>
