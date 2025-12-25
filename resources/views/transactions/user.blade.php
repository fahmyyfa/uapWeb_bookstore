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
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3">Buku</th>
                    <th class="px-4 py-3 text-center">Jumlah</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3 text-center">Invoice</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $t)
                <tr class="border-t">
                    <td class="px-4 py-3">{{ $t->book->title }}</td>
                    <td class="px-4 py-3 text-center">{{ $t->quantity }}</td>
                    <td class="px-4 py-3">
                        Rp {{ number_format($t->total_price, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-3">
                        {{ $t->created_at->format('d M Y') }}
                    </td>
                    <td class="px-4 py-3 text-center space-x-2">
                        <a href="{{ route('transactions.preview', $t->id) }}"
                           class="bg-gray-600 text-white px-3 py-1 rounded text-xs">
                           👁 Preview
                        </a>
                        <a href="{{ route('transactions.invoice', $t->id) }}"
                           class="bg-blue-600 text-white px-3 py-1 rounded text-xs">
                           📄 PDF
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
