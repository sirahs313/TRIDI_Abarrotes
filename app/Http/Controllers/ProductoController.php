<?php

namespace App\Http\Controllers;

use App\Models\Producto;

use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;


class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all(); // Obtener todos los usuarios
        return view('Productos.main', ['productos' => $productos]);
    }
}
