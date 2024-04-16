<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index(){
        return view('proveedores');
    }

    public function store(Request $request)
    {
        $proveedor = new Proveedores();
        $proveedor->Nombre = $request->input('Nombre'); // Cambio aquí
        $proveedor->Telefono = $request->input('Telefono'); // Cambio aquí
        $proveedor->Direccion = $request->input('Direccion'); // Cambio aquí
        $proveedor->save();
    
        return redirect()->route('proveedores.index')->with('message', 'Proveedor agregado correctamente');
    }
}
