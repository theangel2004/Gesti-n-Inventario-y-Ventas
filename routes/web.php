<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// --- AQUÍ ESTÁ EL CAMBIO: Se eliminó el Route::view viejo ---
Route::get('/inventario', [ProductController::class, 'index'])->name('inventory'); // Le dejé el nombre 'inventory' por si lo usas en tu barra de navegación
Route::post('/inventario', [ProductController::class, 'store'])->name('products.store');


Route::view('/categorias', 'categories')->name('categories');

Route::view('/partners', 'partners')->name('partners.index');

Route::view('/ventas', 'sales')->name('sales');

Route::view('/reportes', 'reports')->name('reports');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
