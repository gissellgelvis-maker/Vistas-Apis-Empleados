<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\FuncionCargoController;

//login
Route::get('/', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.store');

// Registro
Route::get('/register', function () {   return view('auth.register'); })->name('register');

Route::post('/register', [LoginController::class, 'register'])->name('register.store');

//inicio
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

// empleados CRUD
Route::get('/empleados', [EmpleadoController::class, 'index']) ->name('empleados.index');

Route::get('/empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');

Route::post('/empleados', [EmpleadoController::class, 'store']) ->name('empleados.store');

Route::get('/empleados/{id}/edit', [EmpleadoController::class, 'edit']) ->name('empleados.edit');

Route::put('/empleados/{id}', [EmpleadoController::class, 'update']) ->name('empleados.update');

Route::delete('/empleados/{id}', [EmpleadoController::class, 'destroy']) ->name('empleados.destroy');

// Cargos CRUD
Route::get('/cargos', [CargoController::class, 'index']) ->name('cargos.index');

Route::get('/cargos/create', [CargoController::class, 'create'])->name('cargos.create');

Route::post('/cargos', [CargoController::class, 'store'])->name('cargos.store');

Route::get('/cargos/{id}/edit', [CargoController::class, 'edit']) ->name('cargos.edit');

Route::put('/cargos/{id}', [CargoController::class, 'update']) ->name('cargos.update');

Route::delete('/cargos/{id}', [CargoController::class, 'destroy']) ->name('cargos.destroy');

// funciones-cargos
Route::get('/funciones', [FuncionCargoController::class, 'index']) ->name('funciones.index');

Route::get('/funciones/create', [FuncionCargoController::class, 'create']) ->name('funciones.create');

Route::post('/funciones', [FuncionCargoController::class, 'store']) ->name('funciones.store');

Route::get('/funciones/{id}/edit', [FuncionCargoController::class, 'edit']) ->name('funciones.edit');

Route::put('/funciones/{id}', [FuncionCargoController::class, 'update']) ->name('funciones.update');

Route::delete('/funciones/{id}', [FuncionCargoController::class, 'destroy']) ->name('funciones.destroy');



// cierre sesion
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
