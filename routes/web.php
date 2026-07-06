<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmpleadoController;

//login
Route::get('/', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.store');

// Registro
Route::get('/register', function () {   return view('auth.register'); })->name('register');

Route::post('/register', [LoginController::class, 'register'])->name('register.store');

Route::get('/empleados', [EmpleadoController::class, 'index']) ->name('empleados.index');

Route::get('/empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');

Route::post('/empleados', [EmpleadoController::class, 'store']) ->name('empleados.store');

Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
