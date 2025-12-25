<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->where('stock', '>', 0)->get();
        return view('shop.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('shop.show', compact('book'));
    }

    public function buy(Request $request, Book $book)
    {
        $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        if ($request->quantity > $book->stock) {
            return back()->withErrors('Stok tidak mencukupi.');
        }

        Transaction::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'quantity' => $request->quantity,
            'total_price' => $book->price * $request->quantity,
        ]);

        $book->decrement('stock', $request->quantity);

        return redirect()->route('transactions.user')
            ->with('success', 'Pembelian berhasil 🎉');
    }
}
