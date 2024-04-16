<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre','PU','Stock','Categoria'];


    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function venta(){
        return $this->belongsToMany(Ventas::class);
    }


}
