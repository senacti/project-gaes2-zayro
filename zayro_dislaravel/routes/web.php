<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DisfracesController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\FacturaController;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/pedidos', [DashboardController::class, 'pedidos'])->name('pedidos');
    Route::get('/vendedores', [DashboardController::class, 'vendedores'])->name('vendedores');
    Route::get('/marketing', [DashboardController::class, 'marketing'])->name('marketing');
    Route::get('/inventario', [DashboardController::class, 'inventario'])->name('inventario');
    Route::get('/informes', [DashboardController::class, 'informes'])->name('informes');
    Route::get('/carrito', [DashboardController::class, 'carrito'])->name('carrito');
    
    Route::get('/factura', [FacturaController::class, 'index'])->name('factura');

    // Productos
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show');
    Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
    Route::put('/productos/{id}/habilitar', [ProductoController::class, 'habilitar'])->name('productos.habilitar');
    Route::put('/productos/{id}/inhabilitar', [ProductoController::class, 'inhabilitar'])->name('productos.inhabilitar');

    // Usuarios
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');
    Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

    // PDF
    Route::get('/usuarios/pdf', [PDFController::class, 'usuariosPDF'])->name('usuarios.pdf');
    Route::get('/productos/pdf', [PDFController::class, 'productosPDF'])->name('productos.pdf');

    // reportes
    Route::get('/reporte', [ReporteController::class, 'index'])->name('reporte.index');
    Route::post('/reporte/filter', [ReporteController::class, 'filter'])->name('reporte.filter');
});

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/500', [IndexController::class, 'error500']);
Route::get('/404', [IndexController::class, 'error404']);
Route::get('/nosotros', [IndexController::class, 'nosotros'])->name('nosotros');

Route::get('/disfraces', [DisfracesController::class, 'index'])->name('disfraces');