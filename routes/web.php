<?php

use App\Http\Controllers\User\UserOrder;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/menu', [GuestController::class, 'menu'])->name('menu');
Route::get('/services', [GuestController::class, 'services'])->name('services');
Route::get('/about', [GuestController::class, 'about'])->name('about');
Route::get('/contact', [GuestController::class, 'contact'])->name('contact');

// CART
Route::get('/cart', [GuestController::class, 'cart'])->name('cart');
Route::get('/cart/{id}', [GuestController::class, 'deleteCart'])->name('delete.cart');

//Checkout
Route::get('/prepared-checkout', [GuestController::class, 'preparedCheckout'])->name('prepared.checkout');
Route::get('/checkout', [GuestController::class, 'checkout'])->name('checkout')->middleware('check-for-price');
Route::post('/checkout', [GuestController::class, 'storeCheckout'])->name('store.checkout')->middleware('check-for-price');

// Product
Route::get('/product/product-single/{id}', [GuestController::class, 'productSingle'])->name('productSingle');
Route::post('/product/product-single/{id}', [GuestController::class, 'addCart'])->name('add.Cart');
Route::get('/product/pay', [GuestController::class, 'productPay'])->name('product.pay')->middleware('check-for-price');
Route::get('/success', [GuestController::class, 'success'])->name('success')->middleware('check-for-price');

Route::post('/product/bookings', [GuestController::class, 'bookingTables'])->name('booking.tables');


Route::get('/users/order', [UserOrder::class, 'displayOrder'])->name('users.orders');



Route::post('/logout', [GuestController::class, 'logout'])->middleware(['auth', 'verified'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
