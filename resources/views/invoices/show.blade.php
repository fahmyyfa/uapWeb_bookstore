@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow rounded p-8 mt-6">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-blue-600">Book Kurnia</h1>
            <p class="text-sm text-gray-500">Invoice Pembelian</p>
        </div>
        <div class="text-right">
            <p class="text-sm">Invoice #: <strong>#{{ $transaction->id }}</strong></p>
            <p class="text-sm">{{ $transaction->created_at->format('d M Y') }}</p>
        </div>
    </div>

    <hr class="mb-6">

    <div class="mb-6">
        <h3 class="font-semibold mb-1">Pembeli</h3>
        <p>{{ $transaction->user->name }}</p>
        <p class="text-sm text-gray-500">{{ $transaction->user->email }}</p>
    </div>

    <table class="w-full mb-6">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Buku</th>
                <th class="px-4 py-2 text-center">Jumlah</th>
                <th class="px-4 py-2 text-right">Harga</th>
                <th class="px-4 py-2 text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-t">
                <td class="px-4 py-2">{{ $transaction->book->title }}</td>
                <td class="px-4 py-2 text-center">{{ $transaction->quantity }}</td>
                <td class="px-4 py-2 text-right">
                    Rp {{ number_format($transaction->book->price, 0, ',', '.') }}
                </td>
                <td class="px-4 py-2 text-right font-semibold">
                    Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                </td>
            </tr>
        </tbody>
    </table>

    <div class="flex justify-between items-center">
        <a href="{{ route('transactions.user') }}"
           class="px-4 py-2 border rounded hover:bg-gray-100">
            ← Kembali
        </a>

        <button onclick="window.print()"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            🖨️ Cetak Invoice
        </button>
    </div>

</div>
@endsection
