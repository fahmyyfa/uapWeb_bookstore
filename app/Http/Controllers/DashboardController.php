<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\Transaction;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // SUMMARY CARD
        $totalCategories = Category::count();
        $totalBooks = Book::count();
        $totalTransactions = Transaction::count();

        // 📊 TRANSAKSI PER BULAN (TAHUN INI)
        $transactionsPerMonth = Transaction::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // FORMAT DATA UNTUK CHART
        $labels = [];
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = Carbon::create()->month($i)->format('M');

            $found = $transactionsPerMonth->firstWhere('month', $i);
            $data[] = $found ? $found->total : 0;
        }

        return view('dashboard.index', compact(
            'totalCategories',
            'totalBooks',
            'totalTransactions',
            'labels',
            'data'
        ));
    }
}
