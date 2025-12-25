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
| AUTHENTICATION
|--------------------------------------------------------------------------
*/
Route::get('/login', [WebAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [WebAuthController::class, 'login']);

Route::get('/register', [WebAuthController::class, 'showRegister'])->name('register');
Route::post('/register', [WebAuthController::class, 'register']);

Route::post('/logout', [WebAuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
| Only admin can access
*/
Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Category & Book Management
    Route::resource('categories', CategoryController::class);
    Route::resource('books', BookController::class);

    // Transaction Management (Admin)
    Route::get('/transactions', [TransactionController::class, 'index'])
        ->name('transactions.index');

    // Verify payment
    Route::post('/transactions/{transaction}/verify', [TransactionController::class, 'verify'])
        ->name('transactions.verify');
});

/*
|--------------------------------------------------------------------------
| USER AREA
|--------------------------------------------------------------------------
| Authenticated users
*/
Route::middleware(['auth'])->group(function () {

    // Shop
    Route::get('/shop', [ShopController::class, 'index'])
        ->name('shop.index');

    Route::get('/shop/{book}', [ShopController::class, 'show'])
        ->name('shop.show');

    Route::post('/shop/{book}/buy', [ShopController::class, 'buy'])
        ->name('shop.buy');

    // User Transactions
    Route::get('/my-transactions', [TransactionController::class, 'user'])
        ->name('transactions.user');

    // Payment (Manual)
    Route::get('/payment/{transaction}', [TransactionController::class, 'payment'])
        ->name('payment.page');

    Route::post('/payment/{transaction}', [TransactionController::class, 'uploadPayment'])
        ->name('payment.upload');

    // Invoice
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
Route::fallback(function () {
    return redirect()->route('login');
});
