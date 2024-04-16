<?php

namespace App\Http\Controllers;

use App\Models\DetalleCompra;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Compra;
use App\Models\Producto;
use App\Models\Proveedores;

class CompraController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        $proveedores = Proveedores::all();
        return view('compras.main', compact('categorias','proveedores'));
    }

    public function store(Request $request)
    {
        $compra = new Compra();
        $compra->Fecha = $request->input('fecha');        
        $compra->total = ($request->input('cantidad') * $request->input('precio'))*1.16;
        $compra->proveedor = $request->input('proveedor'); 
        $compra->save();

        $comppart = new DetalleCompra();
        $comppart->Compra = $compra->id;
        $comppart->Producto = $request->input('producto');
        $comppart->Subtotal = $request->input('cantidad') * $request->input('precio');
        $comppart->Cantidad = $request->input('cantidad');   
        $comppart->save();

        $producto = new Producto();
        $producto->descrip = $request->input('producto');
        $producto->stock = $request->input('cantidad');
        $producto->PU = $request->input('precio');
        $producto->Categoria = $request->input('categoria');
        $producto->save();
        
        return redirect()->route('compras')->with('message', 'Compra agregada correctamente');
    }
}
