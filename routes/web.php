<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Auth\GoogleController;

// --- Rute Publik ---
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/{slug}', [GameController::class, 'show'])->name('games.show');
Route::get('/harga', [PricingController::class, 'index'])->name('pricing.index');
Route::get('/company', function () {
    return view('company.index');
})->name('company');


// --- Rute yang Memerlukan Login ---
Route::middleware('auth')->group(function () {
    // Rute untuk dashboard klien (tujuan setelah login user biasa)
    Route::get('/client/dashboard', [ClientDashboardController::class, 'index'])->name('client.dashboard');

    // Rute untuk dashboard admin
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); // Pastikan view ini ada atau buat nanti
    })->middleware('admin')->name('admin.dashboard');

    // Redirect /dashboard ke dashboard yang sesuai
    Route::get('/dashboard', function () {
        if (auth()->user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('client.dashboard');
    })->name('dashboard');
    Route::delete('/subscription/{order}/cancel', [SubscriptionController::class, 'cancel'])->name('subscription.cancel');
    Route::get('/client/invoices', [InvoiceController::class, 'index'])->name('client.invoices.index');
    Route::get('/client/invoices/{order}', [InvoiceController::class, 'show'])->name('client.invoices.show');

    // Rute untuk halaman checkout
    Route::get('/checkout/{package}', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    // Rute untuk halaman profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
