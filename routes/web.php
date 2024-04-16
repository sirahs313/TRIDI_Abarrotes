<?php
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('categorias/dex',[CategoriaController::class,'index'])->name('categorias.index');
Route::get('categorias/create',[CategoriaController::class,'create'])->name('categorias.create');
Route::Post('categorias',[CategoriaController::class,'store'])->name('categorias.store');
Route::get('categorias/{id}',[CategoriaController::class,'show'])->name('categorias.show');
Route::get('categorias/{id}/edit',[CategoriaController::class,'edit'])->name('categorias.edit');
Route::Put('categorias/{id}',[CategoriaController::class,'update'])->name('categorias.update');
Route::delete('categorias/{id}',[CategoriaController::class,'destroy'])->name('categorias.destroy');

Route::get('principal', [UserController::class, 'home']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/ventas/create', [VentaController::class, 'create'])->name('ventas.create');
Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');
