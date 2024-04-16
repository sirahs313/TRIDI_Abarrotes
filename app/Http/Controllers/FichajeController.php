<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FichajeController extends Controller
{
    public function registrarEntrada(Request $request)
{
    $fichaje = new Fichaje();
    $fichaje->empleado_id = $request->empleado_id; // Asumiendo que envías empleado_id
    $fichaje->hora_entrada = now();
    $fichaje->save();

    return redirect()->back()->with('status', 'Entrada registrada correctamente!');
}

public function registrarSalida(Request $request, $id)
{
    $fichaje = Fichaje::find($id);
    $fichaje->hora_salida = now();
    $fichaje->save();

    return redirect()->back()->with('status', 'Salida registrada correctamente!');
}

}

