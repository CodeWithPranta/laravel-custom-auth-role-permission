<?php
namespace App\Http\Controllers;

use App\Models\PostEvent;
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

    // Chat option
    // Route::post('/chat/send', [ChatController::class, 'sendMessage']);

    //Profile edit and update section
    Route::get('dashboard/edit-profile', [ProfileController::class, 'edit'])->name('user.edit_profile');
    Route::post('dashboard/edit-profile', [ProfileController::class, 'update'])->name('user.update_profile');
    Route::get('dashboard/profile', [ProfileController::class, 'show'])->name('user.show_profile');

    // Change password
    Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('change.password');
    Route::post('/change-password', [ChangePasswordController::class, 'updatePassword'])->name('update.password');

    // Post events
    Route::get('user/events', [PostEventController::class, 'index'])->name('events.index');
    Route::get('user/events/create', [PostEventController::class, 'create'])->name('events.create');
    Route::post('user/events/create', [PostEventController::class, 'store'])->name('events.store');
    Route::get('user/events/edit/{id}', [PostEventController::class, 'edit'])->name('events.edit');
    Route::put('user/events/edit/{id}', [PostEventController::class, 'update'])->name('events.update');
    Route::delete('user/events/{id}', [PostEventController::class, 'destroy'])->name('events.destroy');

    // See registered users
    Route::get('verified-users', [WelcomeController::class, 'allUsers'])->name('verified.users');
});

Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/admin-dashboard', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('adminusers', Admin\UserController::class);
});



