<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\FichajeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('principal', [UserController::class, 'home']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/fichajes/entrada', [FichajeController::class, 'registrarEntrada']);
Route::patch('/fichajes/salida/{id}', [FichajeController::class, 'registrarSalida']);
