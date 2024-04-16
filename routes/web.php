<?php
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\FichajeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});




Route::get('categorias/dex',[CategoriaController::class,'index'])->name('categorias.index');
Route::get('categorias/create',[CategoriaController::class,'create'])->name('categorias.create');
Route::Post('categorias',[CategoriaController::class,'store'])->name('categorias.store');
Route::get('categorias/{id}',[CategoriaController::class,'show'])->name('categorias.show');
Route::get('categorias/{id}/edit',[CategoriaController::class,'edit'])->name('categorias.edit');
Route::Put('categorias/{id}',[CategoriaController::class,'update'])->name('categorias.update');
Route::delete('categorias/{id}',[CategoriaController::class,'destroy'])->name('categorias.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/productos', [ProductoController::class, 'index'])->name('producto.index');

Route::get('/ventas', [App\Http\Controllers\VentaController::class, 'index'])->name('ventas');
Route::post('/ventas', [App\Http\Controllers\VentaController::class, 'store'])->name('ventas.store');

Route::get('/compras', [App\Http\Controllers\CompraController::class, 'index'])->name('compras');
Route::post('/compras', [App\Http\Controllers\CompraController::class, 'store'])->name('compras.store');
Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');
Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');


Route::get('/fichaje', [FichajeController::class, 'index'])->name('fichaje.index');
Route::post('/fichaje/entrada', [FichajeController::class, 'registrarEntrada'])->name('fichaje.entrada');
Route::post('/fichaje/salida', [FichajeController::class, 'registrarSalida'])->name('fichaje.salida');
Route::delete('/fichaje/{id}', [FichajeController::class, 'destroy'])->name('fichaje.destroy');

