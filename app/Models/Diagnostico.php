<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;

    public function detalleRecepcionTecnico(){
        return $this->belongsTo(DetalleRecepcionTecnico::class);
    }

    public function detalleEntregaDonaciones(){
        return $this->hasMany(DetalleEntregaDonacion::class);
       }
}
