@extends('layouts.invoice')

@section('content')
<div class="header">
    <div class="title">📦 INVOICE PEMBELIAN</div>
    <p><strong>Book Kurnia</strong></p>
    <p>Tanggal: {{ $transaction->created_at->format('d M Y') }}</p>
    <p>Invoice #: INV-{{ str_pad($transaction->id, 5, '0', STR_PAD_LEFT) }}</p>
</div>

<table>
    <thead>
        <tr>
            <th>Buku</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $transaction->book->title }}</td>
            <td>Rp {{ number_format($transaction->book->price, 0, ',', '.') }}</td>
            <td>{{ $transaction->quantity }}</td>
            <td>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
        </tr>
    </tbody>
</table>

<p class="total" style="margin-top: 15px;">
    GRAND TOTAL: Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
</p>

<p style="margin-top: 40px;">
    Terima kasih telah berbelanja di <strong>Book Kurnia</strong>.
</p>
@endsection
