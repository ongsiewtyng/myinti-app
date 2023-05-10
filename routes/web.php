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
Route::get('/approval', [App\Http\Controllers\Auth\AdminController::class, 'approval'])->name('approval');
Route::get('/booking', [App\Http\Controllers\Auth\AdminController::class, 'booking'])->name('booking');
Route::get('/message', [App\Http\Controllers\Auth\AdminController::class, 'message'])->name('message');
Route::get('/profile/edit/{id}', [App\Http\Controllers\EditProfileController::class, 'edit'])->name('menus.edit-profile');
Route::put('update/{id}',[App\Http\Controllers\EditProfileController::class,'update'])->name('update');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/service1',[App\Http\Controllers\ServicesController::class,'service1'])->name('service1');
Route::get('/service2',[App\Http\Controllers\ServicesController::class,'service2'])->name('service2');
Route::get('/drink',[App\Http\Controllers\CafeController::class,'drink'])->name('drinks');
Route::get('/burger',[App\Http\Controllers\CafeController::class,'burger'])->name('burgers');
Route::get('/sandwich',[App\Http\Controllers\CafeController::class,'sandwich'])->name('sandwiches');
Route::get('/wrap',[App\Http\Controllers\CafeController::class,'wrap'])->name('wraps');
Route::get('/snack',[App\Http\Controllers\CafeController::class,'snack'])->name('snacks');
Route::get('/western',[App\Http\Controllers\CafeController::class,'western'])->name('westernfood');
Route::get('/rice',[App\Http\Controllers\CafeController::class,'rice'])->name('friedrice');
Route::get('/noodles',[App\Http\Controllers\CafeController::class,'noodles'])->name('noodles');
Route::get('/service3',[App\Http\Controllers\ServicesController::class,'service3'])->name('service3');
Route::get('/confirmBooking',[App\Http\Controllers\BookSessionController::class,'index'])->name('confirmBooking');
Route::get('/confirmBooking/{id}/{time}', [App\Http\Controllers\BookSessionController::class, 'confirmBooking'])->name('confirmBooking');
