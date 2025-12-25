@extends('layouts.app')

@section('content')
<div class="p-6">

    <!-- SUMMARY -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-gray-500">Total Kategori</p>
            <h2 class="text-3xl font-bold text-blue-600">{{ $totalCategories }}</h2>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-gray-500">Total Buku</p>
            <h2 class="text-3xl font-bold text-blue-600">{{ $totalBooks }}</h2>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-gray-500">Total Transaksi</p>
            <h2 class="text-3xl font-bold text-green-600">{{ $totalTransactions }}</h2>
        </div>
    </div>

    <!-- CHART -->
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-xl font-semibold mb-4">📊 Penjualan per Bulan</h2>
        <canvas id="salesChart" height="100"></canvas>
    </div>

</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Jumlah Transaksi',
                data: @json($data),
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37, 99, 235, 0.2)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
</script>
@endsection
