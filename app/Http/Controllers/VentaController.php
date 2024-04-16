<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\DetalleVenta;
use Illuminate\Support\Facades\DB;
use App\Models\Venta;

class VentaController extends Controller
{
    
    public function index()
    {
        $prods = Producto::all();
        
        return view('ventas.create', ['prods' => $prods]);
    }

    public function store(Request $request){
        $venta = new Venta();
        $venta->Fecha = $request->input('fecha');
        $venta->Total = $request->input('total');
        $venta->Cliente = $request->input('cliente');
        $venta->save();

        $partvta = new DetalleVenta();
        $partvta->Venta = $venta->id;
        $partvta->Producto = $request->input('nombreProducto');
        $partvta->Subtotal = $request->input('total');
        $partvta->Cantidad = $request->input('cantidad');
        $partvta->save();

        return redirect()->route('ventas')->with('message', 'VEnta agregada correctamente');
    }
}
