<?php

namespace App\Http\Controllers;

use App\Models\Transaction; // ✅ WAJIB
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * ==========================
     * ADMIN — Semua transaksi
     * ==========================
     */
    public function index()
    {
        $transactions = Transaction::with(['user', 'book'])
            ->latest()
            ->get();

        return view('transactions.admin', compact('transactions'));
    }

    /**
     * ==========================
     * USER — Riwayat transaksi
     * ==========================
     */
    public function user()
    {
        $transactions = Transaction::with('book')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('transactions.user', compact('transactions'));
    }

    /**
     * ==========================
     * USER — Halaman pembayaran
     * ==========================
     */
    public function payment(Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            abort(403);
        }

        return view('shop.payment', compact('transaction'));
    }

    /**
     * ==========================
     * USER — Upload bukti bayar
     * ==========================
     */
    public function uploadPayment(Request $request, Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'payment_proof' => 'required|image|max:2048'
        ]);

        $file = $request->file('payment_proof')
            ->store('payments', 'public');

        $transaction->update([
            'payment_proof' => $file,
            'payment_status' => 'waiting_verification',
        ]);

        return redirect()
            ->route('transactions.user')
            ->with('success', 'Bukti pembayaran berhasil dikirim');
    }

    /**
     * ==========================
     * ADMIN — Verifikasi
     * ==========================
     */
    public function verify(Transaction $transaction)
    {
        $transaction->update([
            'payment_status' => 'paid',
        ]);

        return back()->with('success', 'Pembayaran berhasil diverifikasi');
    }
}
