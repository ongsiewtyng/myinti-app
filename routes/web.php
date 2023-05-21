<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');
Route::post('/authenticate', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class,'reset'])->name('password.update');

Route::get('/admin', [App\Http\Controllers\Auth\AdminController::class, 'index'])->name('admin');
Route::match(['get', 'post'], '/dashboard', [App\Http\Controllers\Auth\AdminController::class, 'home'])->name('dashboard');
Route::get('/food', [App\Http\Controllers\Auth\AdminController::class, 'food'])->name('food');
Route::post('/add-category', [App\Http\Controllers\Auth\AdminController::class, 'addCategory'])->name('add-category');
Route::post('/add-food', [App\Http\Controllers\Auth\AdminController::class, 'addFood'])->name('add-food');
Route::post('/food/{id}/toggle-availability', [App\Http\Controllers\Auth\AdminController::class, 'toggleAvailability'])->name('food.toggleAvailability');
Route::put('/food/update/{id}', [App\Http\Controllers\Auth\AdminController::class,'updateFood'])->name('food.update');

Route::get('/approval', [App\Http\Controllers\Auth\AdminController::class, 'approval'])->name('approval');
Route::get('/booking', [App\Http\Controllers\Auth\AdminController::class, 'booking'])->name('booking');
Route::get('/message', [App\Http\Controllers\Auth\AdminController::class, 'message'])->name('message');

Route::get('/profile/edit/{id}', [App\Http\Controllers\EditProfileController::class, 'edit'])->name('menus.edit-profile');
Route::put('update/{id}',[App\Http\Controllers\EditProfileController::class,'update'])->name('update');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

Route::get('/service1',[App\Http\Controllers\ServicesController::class,'service1'])->name('service1');

Route::get('/service2',[App\Http\Controllers\ServicesController::class,'service2'])->name('service2');
Route::get('/drinks',[App\Http\Controllers\CafeController::class,'drinks'])->name('drinks');
Route::get('/burgers',[App\Http\Controllers\CafeController::class,'burgers'])->name('burgers');
Route::get('/sandwiches',[App\Http\Controllers\CafeController::class,'sandwich'])->name('sandwiches');
Route::get('/wraps',[App\Http\Controllers\CafeController::class,'wrap'])->name('wraps');
Route::get('/snacks',[App\Http\Controllers\CafeController::class,'snack'])->name('snacks');
Route::get('/western food',[App\Http\Controllers\CafeController::class,'western'])->name('westernfood');
Route::get('/fried rice',[App\Http\Controllers\CafeController::class,'rice'])->name('friedrice');
Route::get('/noodles',[App\Http\Controllers\CafeController::class,'noodles'])->name('noodles');

Route::get('/cart',[App\Http\Controllers\CafeController::class,'cart'])->name('cart');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('/store', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::post('/add-to-cart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
Route::patch('/cart/{id}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::patch('/cart/payment/{id}', [App\Http\Controllers\CartController::class, 'updatePayment'])->name('cart.updatePayment');
Route::match(['get', 'patch'], '/cart/order/{userId}', [App\Http\Controllers\CartController::class, 'updateOrder'])->name('cart.updateOrder');
Route::delete('/cart/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/cart/count', [App\Http\Controllers\CartController::class,'count'])->name('cart.count');
Route::match(['get', 'post'], '/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/cart/confirmation/{id}', [App\Http\Controllers\CartController::class, 'confirmation'])->name('cart.confirmation');

// Route::get('/payment',[App\Http\Controllers\CartController::class,'showPayment'])->name('payment');
Route::get('/service3',[App\Http\Controllers\ServicesController::class,'service3'])->name('service3');
Route::get('/confirmBooking',[App\Http\Controllers\BookSessionController::class,'index'])->name('confirmBooking');
Route::get('/confirmBooking/{id}/{time}', [App\Http\Controllers\BookSessionController::class, 'confirmBooking'])->name('confirmBooking');
