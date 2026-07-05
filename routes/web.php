<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.store');

Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
