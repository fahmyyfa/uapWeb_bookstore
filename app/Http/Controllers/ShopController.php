<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class ShopController extends Controller
{
    public function index()
    {
        $books = Book::where('stock', '>', 0)->get();
        return view('shop.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('shop.show', compact('book'));
    }

    public function buy(Request $request, Book $book)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $book->stock
        ]);

        $quantity = $request->quantity;
        $total = $book->price * $quantity;

        // Simpan transaksi
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'quantity' => $quantity,
            'total_price' => $total,
        ]);

        // Kurangi stok
        $book->decrement('stock', $quantity);

        // Generate PDF Invoice
        $pdf = Pdf::loadView('transactions.invoice', compact('transaction'));
        $pdfPath = storage_path('app/invoices/invoice-' . $transaction->id . '.pdf');

        if (!file_exists(storage_path('app/invoices'))) {
            mkdir(storage_path('app/invoices'), 0755, true);
        }

        $pdf->save($pdfPath);

        // Kirim Email Invoice
        Mail::to(Auth::user()->email)->send(
            new InvoiceMail($transaction, $pdfPath)
        );

        return redirect()
            ->route('transactions.user')
            ->with('success', 'Pembelian berhasil, invoice dikirim ke email 📧');
    }
}
