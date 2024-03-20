<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentaController extends Controller
{
    
    public function create()
    {
        
        $productos = Producto::all(); 
        return view('ventas.create', compact('productos'));
    }

   
    public function store(Request $request)
    {
        
        $request->validate([
            'productos' => 'required|array',
            'productos.*.id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|numeric|min:1',
           
        ]);

        DB::beginTransaction();
        try {
            $venta = new Venta();
           
            $venta->save();

            $total = 0;
            foreach ($request->productos as $prod) {
                $producto = Producto::find($prod['id']);
                $detalle = new DetalleVenta();
                $detalle->venta_id = $venta->id;
                $detalle->producto_id = $producto->id;
                $detalle->cantidad = $prod['cantidad'];
                $detalle->precio = $producto->precio;
                $detalle->save();

                
                $producto->cantidad -= $prod['cantidad'];
                $producto->save();

                $total += $detalle->precio * $detalle->cantidad;
            }

            $venta->total = $total;
            $venta->save();

        
            DB::commit();

         
            return response()->json(['success' => 'Venta registrada correctamente', 'venta_id' => $venta->id]);
        } catch (\Exception $e) {
           
            DB::rollback();
            return response()->json(['error' => 'Error al registrar la venta'], 500);
        }
    }

    
}
