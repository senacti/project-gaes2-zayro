<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('index');
});

Route::get('/inventario', function () {
    return view('inventario');
});

Route::get('/informes', function () {
    return view('informes');
});

Route::get('/factura', function () {
    return view('factura');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/carrito', function () {
    return view('carrito');
});

Route::get('/500', function () {
    return view('500');
});

Route::get('/404', function () {
    return view('404');
});
