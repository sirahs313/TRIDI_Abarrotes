<?php

namespace App\Http\Controllers;

use App\Models\Producto;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $registros = Producto::all();
        return view('Productos.main', compact('registros'));
    }
}
