<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = ['Fecha','Total','Proveedor'];

    public function detallecompra()
    {
        return $this->hasOne(DetalleCompra::class);
    }

    public function Proveedor()
    {
        return $this->hasOne(Proveedores::class);
    }
}
