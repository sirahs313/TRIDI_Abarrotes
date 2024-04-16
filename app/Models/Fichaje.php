<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichaje extends Model
{
    protected $fillable = ['empleado_id', 'hora_entrada', 'hora_salida'];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}

