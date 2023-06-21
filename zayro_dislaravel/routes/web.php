<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/clientes', [DashboardController::class, 'clientes'])->name('clientes');
    Route::get('/pedidos', [DashboardController::class, 'pedidos'])->name('pedidos');
    Route::get('/vendedores', [DashboardController::class, 'vendedores'])->name('vendedores');
    Route::get('/marketing', [DashboardController::class, 'marketing'])->name('marketing');
    Route::get('/inventario', [DashboardController::class, 'inventario'])->name('inventario');
    Route::get('/informes', [DashboardController::class, 'informes'])->name('informes');
    Route::get('/factura', [DashboardController::class, 'factura'])->name('factura');
    Route::get('/carrito', [DashboardController::class, 'carrito'])->name('carrito');
});

Route::get('/500', [IndexController::class, 'error500']);
Route::get('/404', [IndexController::class, 'error404']);
Route::get('/', [IndexController::class, 'index'])->name('inicio');
Route::get('/disfraces', [IndexController::class, 'disfraces'])->name('disfraces');
