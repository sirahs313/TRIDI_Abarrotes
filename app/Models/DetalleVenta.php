<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $fillable = ['Venta','Producto','Cantidad','Subtotal'];

    public function venta()
    {
        return $this->belongsTo(Ventas::class);
    }
}
