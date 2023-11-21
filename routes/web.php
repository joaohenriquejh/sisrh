<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeneficioController;


Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios.index');
Route::get('/funcionarios/create', [FuncionarioController::class, 'create'])->name('funcionarios.create');
Route::post('/funcionarios', [FuncionarioController::class, 'store'])->name('funcionarios.store');
Route::get('/funcionarios/{id}/edit', [FuncionarioController::class, 'edit'])->name('funcionarios.edit');
Route::get('/funcionarios/{id}/show', [FuncionarioController::class, 'show'])->name('funcionarios.show');
Route::put('/funcionarios/{id}', [FuncionarioController::class, 'update'])->name('funcionarios.update');
Route::delete('/funcionarios/{id}', [FuncionarioController::class, 'destroy'])->name('funcionarios.destroy');

Route::get('/departamentos', [DepartamentoController::class, 'index'])->name('departamentos.index');
Route::get('/departamentos/create', [DepartamentoController::class, 'create'])->name('departamentos.create');
Route::post('/departamentos', [DepartamentoController::class, 'store'])->name('departamentos.store');
Route::get('/departamentos/{id}/edit', [DepartamentoController::class, 'edit'])->name('departamentos.edit');
Route::get('/departamentos/{id}/show', [DepartamentoController::class, 'show'])->name('departamentos.show');
Route::put('/departamentos/{id}', [DepartamentoController::class, 'update'])->name('departamentos.update');


Route::get('/cargos', [CargoController::class, 'index'])->name('cargos.index');
Route::get('/cargos/create', [CargoController::class, 'create'])->name('cargos.create');
Route::post('/cargos', [CargoController::class, 'store'])->name('cargos.store');
Route::get('/cargos/{id}/edit', [CargoController::class, 'edit'])->name('cargos.edit');
Route::get('/cargos/{id}/show', [CargoController::class, 'show'])->name('cargos.show');
Route::put('/cargos/{id}', [CargoController::class, 'update'])->name('cargos.update');


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users/{id}/show', [UserController::class, 'show'])->name('users.show');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


Route::get('/beneficios', [BeneficioController::class, 'index'])->name('beneficio.index');
Route::get('/beneficios/create', [BeneficioController::class, 'create'])->name('beneficio.create');
Route::post('/beneficio', [BeneficioController::class, 'store'])->name('beneficio.store');
Route::get('/beneficio/{id}/edit', [BeneficioController::class, 'edit'])->name('beneficio.edit');
Route::get('/beneficio/{id}/show', [BeneficioController::class, 'show'])->name('beneficio.show');
Route::put('/beneficios/{id}', [BeneficioController::class, 'update'])->name('beneficio.update');
Route::delete('/beneficio/{id}', [BeneficioController::class, 'destroy'])->name('beneficio.destroy');


