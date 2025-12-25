<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ShopController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [WebAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [WebAuthController::class, 'login']);

Route::get('/register', [WebAuthController::class, 'showRegister'])->name('register');
Route::post('/register', [WebAuthController::class, 'register']);

Route::post('/logout', [WebAuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('books', BookController::class);

    Route::get('/transactions', [TransactionController::class, 'index'])
        ->name('transactions.index');
});

/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/shop/{book}', [ShopController::class, 'show'])->name('shop.show');
    Route::post('/shop/{book}/buy', [ShopController::class, 'buy'])->name('shop.buy');

    Route::get('/my-transactions', [TransactionController::class, 'user'])
        ->name('transactions.user');

    // 🔥 INVOICE
    Route::get('/invoice/{transaction}', [TransactionController::class, 'invoice'])
        ->name('transactions.invoice');

    Route::get('/invoice-preview/{transaction}', [TransactionController::class, 'preview'])
        ->name('transactions.preview');
});

/*
|--------------------------------------------------------------------------
| FALLBACK
|--------------------------------------------------------------------------
*/
Route::fallback(fn () => redirect()->route('login'));
