@extends('layouts.app')

@section('content')
<div class="p-6 max-w-2xl mx-auto">

    <h2 class="text-2xl font-bold mb-6">💳 Pembayaran Manual</h2>

    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <p class="font-semibold">{{ $transaction->book->title }}</p>
        <p class="text-gray-500">Jumlah: {{ $transaction->quantity }}</p>
        <p class="text-green-600 font-bold mt-2">
            Total: Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
        </p>

        <p class="mt-4 text-sm text-gray-600">
            Silakan transfer ke:
        </p>

        <ul class="text-sm mt-2">
            <li>🏦 BCA — 1234567890</li>
            <li>👤 a.n Book Kurnia</li>
        </ul>
    </div>

    <form action="{{ route('payment.upload', $transaction) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-lg shadow p-6">

        @csrf

        <label class="block font-medium mb-2">
            Upload Bukti Pembayaran
        </label>

        <input type="file"
               name="payment_proof"
               required
               class="w-full border rounded px-3 py-2 mb-4">

        <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
            Kirim Bukti Pembayaran
        </button>
    </form>
</div>
@endsection
