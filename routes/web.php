<?php

use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.services.index'));
    Route::resource('services', ServiceController::class)->except(['show']);
    Route::patch('services/{service}/restore', [ServiceController::class, 'restore'])
        ->withTrashed()
        ->name('services.restore');
    // Di dalam grup Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () { ... });
    Route::get('/password', [PasswordController::class, 'edit'])->name('password.edit');
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
});
