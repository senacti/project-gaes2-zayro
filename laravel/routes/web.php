<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/inventario', function () {
    return view('inventario');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});