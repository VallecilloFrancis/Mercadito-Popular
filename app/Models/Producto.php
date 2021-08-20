<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    public function detalles(){
        return $this->hasMany(Detalle::class);
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class, 'proveedorid', 'id');
    }
}
