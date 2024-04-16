<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadosTableSeeder extends Seeder
{
    public function run()
    {

        Empleado::create([
            'Nombre' => 'John Doe',
            'Puesto' => 'Gerente',
            'Telefono' => '7714900340',
            'Direccion' => 'Amapola',
            'User' => 1,  // Asegúrate de que este ID exista en tu tabla `users`, o ajusta según tu diseño
            'updated_at'=> '2024-04-16 06:56:12',
            'created_at'=> '2024-04-16 06:56:12'
            ]);
        
        // Puedes añadir más empleados aquí
    }
}
