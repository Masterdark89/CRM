<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Contactos
Route::get('/contactos', [App\Http\Controllers\ContactosController::class, 'index'])->name('contactos.index');
Route::get('/contactos/create', [App\Http\Controllers\ContactosController::class, 'create'])->name('contactos.create');
Route::post('/contactos', [App\Http\Controllers\ContactosController::class, 'store'])->name('contactos.store');
Route::get('/contactos/{contacto}', [App\Http\Controllers\ContactosController::class, 'show'])->name('contactos.show');
Route::get('/contactos/{contacto}/edit', [App\Http\Controllers\ContactosController::class, 'edit'])->name('contactos.edit');
Route::put('/contactos/{contacto}', [App\Http\Controllers\ContactosController::class, 'update'])->name('contactos.update');
Route::delete('/contactos/{contacto}', [App\Http\Controllers\ContactosController::class, 'destroy'])->name('contactos.destroy');

// Artículos
Route::get('/articulos', [App\Http\Controllers\ArticulosController::class, 'index'])->name('articulos.index');
Route::get('/articulos/create', [App\Http\Controllers\ArticulosController::class, 'create'])->name('articulos.create');
Route::post('/articulos', [App\Http\Controllers\ArticulosController::class, 'store'])->name('articulos.store');
Route::get('/articulos/{articulo}', [App\Http\Controllers\ArticulosController::class, 'show'])->name('articulos.show');
Route::get('/articulos/{articulo}/edit', [App\Http\Controllers\ArticulosController::class, 'edit'])->name('articulos.edit');
Route::put('/articulos/{articulo}', [App\Http\Controllers\ArticulosController::class, 'update'])->name('articulos.update');
Route::delete('/articulos/{articulo}', [App\Http\Controllers\ArticulosController::class, 'destroy'])->name('articulos.destroy');

// Personal
Route::get('/personal', [App\Http\Controllers\PersonalController::class, 'index'])->name('personal.index');
Route::get('/personal/create', [App\Http\Controllers\PersonalController::class, 'create'])->name('personal.create');
Route::post('/personal', [App\Http\Controllers\PersonalController::class, 'store'])->name('personal.store');
Route::get('/personal/{personal}', [App\Http\Controllers\PersonalController::class, 'show'])->name('personal.show');
Route::get('/personal/{personal}/edit', [App\Http\Controllers\PersonalController::class, 'edit'])->name('personal.edit');
Route::put('/personal/{personal}', [App\Http\Controllers\PersonalController::class, 'update'])->name('personal.update');
Route::delete('/personal/{personal}', [App\Http\Controllers\PersonalController::class, 'destroy'])->name('personal.destroy');

// Stock
Route::get('/stock', [App\Http\Controllers\StockController::class, 'index'])->name('stock.index');
Route::get('/stock/create', [App\Http\Controllers\StockController::class, 'create'])->name('stock.create');
Route::post('/stock', [App\Http\Controllers\StockController::class, 'store'])->name('stock.store');
Route::get('/stock/{item}', [App\Http\Controllers\StockController::class, 'show'])->name('stock.show');
Route::get('/stock/{item}/edit', [App\Http\Controllers\StockController::class, 'edit'])->name('stock.edit');
Route::put('/stock/{item}', [App\Http\Controllers\StockController::class, 'update'])->name('stock.update');
Route::delete('/stock/{item}', [App\Http\Controllers\StockController::class, 'destroy'])->name('stock.destroy');