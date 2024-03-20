<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('principal', [UserController::class, 'home']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// formulario de nueva venta
Route::get('/ventas/create', [VentaController::class, 'create'])->name('ventas.create');
// almacenamiento de una nueva venta
Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');