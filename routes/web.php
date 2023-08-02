<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('login');
});


Route::get('/funcionarios', function () {
    return view('funcionarios.index');
});


Route::get('/funcionarios/novo', function () {
    return view('funcionarios.create');
});
