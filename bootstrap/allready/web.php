<?php

use Illuminate\Support\Facades\Route;

// routes/web.php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\Admin\RequestController as AdminRequestController;

// Auth Routes

// Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
// Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User Routes
Route::middleware('auth')->group(function () {
    Route::resource('requests', RequestController::class)->except(['edit', 'update', 'destroy']);
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/requests', [AdminRequestController::class, 'index'])->name('requests.index');
        Route::post('/requests/{cleaningRequest}/status', [AdminRequestController::class, 'updateStatus'])
            ->name('requests.update.status');
    });
});

// Home Route
Route::redirect('/', '/login');




Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');
