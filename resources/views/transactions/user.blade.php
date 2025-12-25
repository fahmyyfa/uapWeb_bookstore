@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Riwayat Pembelian</h2>

    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-3 text-left">Buku</th>
                <th class="p-3 text-left">Total</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
                <tr class="border-t">
                    <td class="p-3">
                        {{ $transaction->book->title }}
                    </td>
                    <td class="p-3">
                        Rp {{ number_format($transaction->total_price) }}
                    </td>
                    <td class="p-3">
                        @if ($transaction->payment_status === 'pending')
                            <span class="px-2 py-1 text-sm bg-yellow-100 text-yellow-700 rounded">
                                Belum Dibayar
                            </span>
                        @elseif ($transaction->payment_status === 'waiting_verification')
                            <span class="px-2 py-1 text-sm bg-blue-100 text-blue-700 rounded">
                                Menunggu Verifikasi
                            </span>
                        @else
                            <span class="px-2 py-1 text-sm bg-green-100 text-green-700 rounded">
                                Lunas
                            </span>
                        @endif
                    </td>
                    <td class="p-3">
                        @if ($transaction->payment_status === 'pending')
                            <a href="{{ route('payment.page', $transaction) }}"
                               class="text-blue-600 hover:underline">
                                Bayar
                            </a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">
                        Belum ada transaksi
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
