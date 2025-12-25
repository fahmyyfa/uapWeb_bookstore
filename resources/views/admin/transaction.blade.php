@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Verifikasi Transaksi</h2>

    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-gray-100">
                <th>User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Bukti</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $t)
            <tr class="border-t text-center">
                <td>{{ $t->user->name }}</td>
                <td>Rp {{ number_format($t->total_price) }}</td>
                <td>{{ $t->status }}</td>
                <td>
                    @if($t->payment_proof)
                        <a href="{{ asset('storage/'.$t->payment_proof) }}" target="_blank">
                            Lihat
                        </a>
                    @endif
                </td>
                <td>
                    @if($t->status === 'WAITING_VERIFICATION')
                        <form method="POST"
                              action="{{ route('admin.transactions.verify', $t) }}">
                            @csrf
                            <button class="bg-green-600 text-white px-3 py-1 rounded">
                                Verifikasi
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
