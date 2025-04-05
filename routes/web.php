<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('auth.store');
Route::get('register', [AuthController::class, 'showRegisterForm']) -> name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.store');
