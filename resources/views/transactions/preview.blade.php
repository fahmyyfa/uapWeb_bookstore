@extends('layouts.invoice-preview')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 shadow rounded">

    <div class="flex justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold">📦 INVOICE</h1>
            <p class="text-sm text-gray-500">Book Kurnia</p>
        </div>
        <div class="text-right">
            <p class="text-sm">Invoice #INV-{{ str_pad($transaction->id, 5, '0', STR_PAD_LEFT) }}</p>
            <p class="text-sm">{{ $transaction->created_at->format('d M Y') }}</p>
        </div>
    </div>

    <table class="w-full text-sm border">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 border">Buku</th>
                <th class="p-2 border">Harga</th>
                <th class="p-2 border">Qty</th>
                <th class="p-2 border">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="p-2 border">{{ $transaction->book->title }}</td>
                <td class="p-2 border">
                    Rp {{ number_format($transaction->book->price, 0, ',', '.') }}
                </td>
                <td class="p-2 border text-center">{{ $transaction->quantity }}</td>
                <td class="p-2 border font-semibold">
                    Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                </td>
            </tr>
        </tbody>
    </table>

    <div class="mt-6 text-right font-bold">
        GRAND TOTAL: Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
    </div>

    <div class="mt-8 flex justify-between no-print">
        <a href="{{ route('transactions.user') }}"
           class="px-4 py-2 bg-gray-300 rounded">
           ⬅ Kembali
        </a>

        <div class="space-x-2">
            <button onclick="window.print()"
                    class="px-4 py-2 bg-green-600 text-white rounded">
                🖨 Print
            </button>

            <a href="{{ route('transactions.invoice', $transaction->id) }}"
               class="px-4 py-2 bg-blue-600 text-white rounded">
               📄 Download PDF
            </a>
        </div>
    </div>

</div>
@endsection
