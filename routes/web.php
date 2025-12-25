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
Route::get('/login', [WebAuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [WebAuthController::class, 'login']);

Route::get('/register', [WebAuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [WebAuthController::class, 'register']);

Route::post('/logout', [WebAuthController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN AREA (AUTH + ADMIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // CRUD Master Data
    Route::resource('categories', CategoryController::class);
    Route::resource('books', BookController::class);

    // Semua transaksi (ADMIN)
    Route::get('/transactions', [TransactionController::class, 'index'])
        ->name('transactions.index');
});

/*
|--------------------------------------------------------------------------
| USER / CUSTOMER AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /*
    | SHOP (USER ONLY)
    | Admin TIDAK diarahkan ke sini karena redirect login
    */
    Route::get('/shop', [ShopController::class, 'index'])
        ->name('shop.index');

    Route::get('/shop/{book}', [ShopController::class, 'show'])
        ->name('shop.show');

    Route::post('/shop/{book}/buy', [ShopController::class, 'buy'])
        ->name('shop.buy');

    /*
    | USER TRANSACTION HISTORY
    */
    Route::get('/my-transactions', [TransactionController::class, 'user'])
        ->name('transactions.user');
});

/*
|--------------------------------------------------------------------------
| FALLBACK (OPTIONAL BUT CLEAN)
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    return redirect()->route('login');
});
