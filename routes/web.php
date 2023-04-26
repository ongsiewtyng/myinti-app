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
Route::get('/admin', [App\Http\Controllers\Auth\AdminController::class, 'index'])->name('admin');
Route::post('/dashboard', [App\Http\Controllers\Auth\AdminController::class, 'home'])->name('dashboard');
Route::get('/profile/edit/{id}', [App\Http\Controllers\EditProfileController::class, 'edit'])->name('menus.edit-profile');
Route::put('update/{id}',[App\Http\Controllers\EditProfileController::class,'update'])->name('update');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/service1',[App\Http\Controllers\ServicesController::class,'service1'])->name('service1');
Route::get('/service2',[App\Http\Controllers\ServicesController::class,'service2'])->name('service2');
Route::get('/service3',[App\Http\Controllers\ServicesController::class,'service3'])->name('service3');
Route::get('/confirmBooking',[App\Http\Controllers\BookSessionController::class,'index'])->name('confirmBooking');
Route::get('/confirmBooking/{id}/{time}', [App\Http\Controllers\BookSessionController::class, 'confirmBooking'])->name('confirmBooking');
