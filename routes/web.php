<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;


Route::get('/', function () {
    return view('login');
});


Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios.index');
Route::get('/funcionarios/create', [FuncionarioController::class, 'create'])->name('funcionarios.create');
Route::post('/funcionarios', [FuncionarioController::class, 'store'])->name('funcionarios.store');





