<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre', 'Puesto', 'Telefono', 'Direccion', 'User'];
    
}
