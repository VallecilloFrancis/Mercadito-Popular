<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    use HasFactory;
    public function producto(){
        return $this->belongsTo(Producto::class, 'productoid', 'id');
    }

}