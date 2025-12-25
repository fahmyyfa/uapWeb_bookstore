@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">📦 Riwayat Pembelian</h2>

    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">Buku</th>
                    <th class="px-4 py-2">Jumlah</th>
                    <th class="px-4 py-2">Total</th>
                    <th class="px-4 py-2">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $t)
                <tr class="border-t">
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
                    <td colspan="4" class="text-center py-4 text-gray-500">
                        Belum ada pembelian
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
