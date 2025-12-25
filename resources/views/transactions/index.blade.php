@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">📊 Semua Transaksi</h2>

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Buku</th>
                    <th class="px-4 py-2">Jumlah</th>
                    <th class="px-4 py-2">Total</th>
                    <th class="px-4 py-2">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $t)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $t->user->name }}</td>
                    <td class="px-4 py-2">{{ $t->book->title }}</td>
                    <td class="px-4 py-2">{{ $t->quantity }}</td>
                    <td class="px-4 py-2">
                        Rp {{ number_format($t->total_price, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-2">
                        {{ $t->created_at->format('d M Y') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">
                        Belum ada transaksi
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
