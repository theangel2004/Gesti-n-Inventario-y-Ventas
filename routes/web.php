<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/buscar-global', [SearchController::class, 'search'])->name('search.global');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// --- Rutas de Inventario (CRUD Completo con Modales) ---
Route::get('/inventario', [ProductController::class, 'index'])->name('inventory'); 
Route::post('/inventario', [ProductController::class, 'store'])->name('products.store');
Route::get('/inventario/{id}', [ProductController::class, 'show'])->name('products.show');
Route::put('/inventario/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/inventario/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

// --- Rutas dedicadas a la Gestión de Categorías ---
Route::get('/categorias', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categorias/store', [CategoryController::class, 'store'])->name('categories.store');
Route::put('/categorias/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categorias/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// --- Rutas dedicadas a la Gestión de Proveedores (Partners) ---
Route::get('/partners', [ProveedorController::class, 'index'])->name('partners.index');
Route::post('/partners/store', [ProveedorController::class, 'store'])->name('partners.store');
Route::put('/partners/{id}', [ProveedorController::class, 'update'])->name('partners.update');
Route::delete('/partners/{id}', [ProveedorController::class, 'destroy'])->name('partners.destroy');

// --- Rutas de Ventas ---
Route::get('/ventas', [VentaController::class, 'index'])->name('sales.index');
Route::post('/ventas/store', [VentaController::class, 'store'])->name('sales.store');

// --- Rutas de Reportes ---
Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');

// --- Rutas de Perfil (Protegidas por Autenticación) ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';