<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * ADMIN: lihat semua transaksi
     */
    public function index()
    {
        $transactions = Transaction::with(['user', 'book'])
            ->latest()
            ->get();

        return view('transactions.index', compact('transactions'));
    }

    /**
     * USER: lihat transaksi sendiri
     */
    public function user()
    {
        $transactions = Transaction::with('book')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('transactions.user', compact('transactions'));
    }
}
