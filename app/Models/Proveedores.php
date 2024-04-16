<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre','Telefono','Direccion'];

    public function Compra()
    {
        return $this->belongsToMany(Compra::class);
    }
}
