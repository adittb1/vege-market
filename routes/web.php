<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminTransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

// Route untuk halaman utama
Route::get('/',[DashboardController::class, 'index'])->name('dashboard');

// Route untuk login dan register
Route::get('login', function () {
    return view('login');
})->name('login');

// Route untuk login dan register
Route::post('login', [AuthController::class, 'login'])->name('login-post');
Route::post('register', [AuthController::class, 'register'])->name('register-post');

Route::get('register', function () {
    return view('register');
})->name('register');

// Route untuk logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk User
Route::get('/checkout/{product}', [DashboardController::class, 'showCheckoutForm'])->name('checkout.form');
Route::post('/checkout', [DashboardController::class, 'checkout'])->name('checkout');
Route::get('/transactions', [DashboardController::class, 'transactions'])->name('transactions');

// Route untuk Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Route untuk Admin User
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

    // Route untuk Admin Product
    Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');

    // Route untuk Admin Transaction
    Route::get('/admin/transactions', [AdminTransactionController::class, 'index'])->name('admin.transactions.index');
    Route::put('/admin/transactions/{transaction}', [AdminTransactionController::class, 'update'])->name('admin.transactions.update');
    Route::delete('/admin/transactions/{transaction_id}', [AdminTransactionController::class, 'destroy'])->name('admin.transactions.destroy');

});
// Route untuk Fallback jika route tidak ditemukan
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
