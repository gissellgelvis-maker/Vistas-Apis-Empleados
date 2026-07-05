<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

//login
Route::get('/', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.store');

// Registro
Route::get('/register', function () {   return view('auth.register'); })->name('register');

Route::post('/register', [LoginController::class, 'register'])->name('register.store');

Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
