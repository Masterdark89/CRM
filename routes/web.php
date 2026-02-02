<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Clientes
Route::get('/clientes', [App\Http\Controllers\ClientesController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [App\Http\Controllers\ClientesController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [App\Http\Controllers\ClientesController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}', [App\Http\Controllers\ClientesController::class, 'show'])->name('clientes.show');
Route::get('/clientes/{cliente}/edit', [App\Http\Controllers\ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [App\Http\Controllers\ClientesController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [App\Http\Controllers\ClientesController::class, 'destroy'])->name('clientes.destroy');

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