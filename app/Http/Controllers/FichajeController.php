<?php
namespace App\Http\Controllers;

use App\Models\Fichaje;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use App\Models\Empleados;

class FichajeController extends Controller
{
    public function index()
    {
        $fichajes = Fichaje::with('empleado')  // Asegúrate de que la relación 'empleado' está definida en el modelo Fichaje
            ->orderBy('hora_entrada', 'desc')
            ->get();

        return view('fichaje', ['fichajes' => $fichajes]);  // Pasando la variable a la vista
    }


    public function registrarEntrada(Request $request)
    {
        $fichaje = Fichaje::create([
            'empleado_id' => $request->empleado_id,  // Asumiendo que se envía desde el formulario
            'hora_entrada' => Carbon::now(),
        ]);

        return redirect()->route('fichaje.index')->with('status', 'Entrada registrada con éxito!');
    }

    public function registrarSalida(Request $request)
    {
        $fichaje = Fichaje::where('empleado_id', $request->empleado_id)
            ->whereNull('hora_salida')
            ->latest('hora_entrada')
            ->first();

        if ($fichaje) {
            $fichaje->update([
                'hora_salida' => Carbon::now(),
            ]);

            return redirect()->route('fichaje.index')->with('status', 'Salida registrada con éxito!');
        }

        return redirect()->route('fichaje.index')->with('error', 'No se encontró fichaje de entrada pendiente!');
    }

    public function destroy($id)
    {
        $fichaje = Fichaje::findOrFail($id);
        $fichaje->delete();

        return redirect()->route('fichaje.index')->with('status', 'Fichaje eliminado con éxito.');
    }

}
