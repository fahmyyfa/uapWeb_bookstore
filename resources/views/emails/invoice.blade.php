<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice Pembelian</title>
</head>
<body style="font-family: Arial, sans-serif">

    <h2>📦 Invoice Pembelian</h2>

    <p>Halo <strong>{{ $transaction->user->name }}</strong>,</p>

    <p>Terima kasih telah berbelanja di <strong>Book Kurnia</strong>.</p>

    <hr>

    <p><strong>Buku:</strong> {{ $transaction->book->title }}</p>
    <p><strong>Jumlah:</strong> {{ $transaction->quantity }}</p>
    <p><strong>Total:</strong> Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</p>
    <p><strong>Tanggal:</strong> {{ $transaction->created_at->format('d M Y') }}</p>

    <hr>

    <p>📎 Invoice PDF terlampir pada email ini.</p>

    <p>
        Salam hangat,<br>
        <strong>Book Kurnia</strong>
    </p>

</body>
</html>
