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

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index'])->name('home');

Route::get('/register', [\App\Http\Controllers\UserController::class, 'create'])->name('user.register');
Route::post('/register', [\App\Http\Controllers\UserController::class, 'register'])->name('user.store');

Route::middleware(['auth'])->group( function () {
    // logout
    Route::post('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('user.logout');
    Route::get('/dashboard', [\App\Http\Controllers\UserController::class, 'authenticate'])->name('dashboard');
});

Route::get('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('user.login');
Route::post('/login', [\App\Http\Controllers\UserController::class, 'authenticate'])->name('user.authenticate');
Route::get('/password_reset', [\App\Http\Controllers\PasswordResetController::class, 'password_reset'])->name('user.password_reset');
Route::post('/password_reset', [\App\Http\Controllers\PasswordResetController::class, 'send_password_reset_request'])->name('user.password_reset.request');

