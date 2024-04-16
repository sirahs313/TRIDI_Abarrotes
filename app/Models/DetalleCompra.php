<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;

    protected $fillable = ['Compra','Producto','Subtotal','Cantidad'] ;

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }
}
