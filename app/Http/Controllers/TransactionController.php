<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['user', 'book'])
            ->latest()
            ->get();

        return view('transactions.index', compact('transactions'));
    }

    public function user()
    {
        $transactions = Transaction::with('book')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('transactions.user', compact('transactions'));
    }

    // 📄 PREVIEW HTML
    public function preview(Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            abort(403);
        }

        return view('transactions.preview', compact('transaction'));
    }

    // 📥 DOWNLOAD PDF
    public function invoice(Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            abort(403);
        }

        $pdf = Pdf::loadView('transactions.invoice', [
            'transaction' => $transaction
        ]);

        return $pdf->download('invoice-' . $transaction->id . '.pdf');
    }
}
