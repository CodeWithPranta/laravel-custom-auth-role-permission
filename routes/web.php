<?php
namespace App\Http\Controllers;
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

/**
 * Home page routes
 */
Route::get('/', [WelcomeController::class, 'index'])->name('home');

/**
 * Routes related with guest middleware
 */
Route::group(['middleware' => ['guest']], function() {
    Route::get('/register', [UserController::class, 'create'])->name('user.register');
    Route::post('/register', [UserController::class, 'register'])->name('user.store');
    Route::get('/login', [UserController::class, 'login'])->name('user.login');
    Route::post('/login', [UserController::class, 'authenticate'])->name('user.authenticate');
    Route::get('/password_reset', [PasswordResetController::class, 'password_reset'])->name('user.password_reset');
    Route::post('/password_reset', [PasswordResetController::class, 'send_password_reset_request'])->name('user.password_reset.request');
});


Route::middleware(['auth'])->group( function () {
    // logout
    Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/dashboard', function() {
        return view('users.dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/admin-dashboard', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/events', function (){
        return true;
    });

    Route::resource('adminusers', Admin\UserController::class);
});



