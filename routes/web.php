<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/menu', [GuestController::class, 'menu'])->name('menu');
Route::get('/services', [GuestController::class, 'services'])->name('services');
Route::get('/about', [GuestController::class, 'about'])->name('about');
Route::get('/contact', [GuestController::class, 'contact'])->name('contact');
Route::get('/cart', [GuestController::class, 'cart'])->name('cart');
Route::get('/checkout', [GuestController::class, 'checkout'])->name('checkout');
Route::get('/product-single', [GuestController::class, 'productSingle'])->name('productSingle');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
