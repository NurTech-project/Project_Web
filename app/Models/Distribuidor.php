<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribuidor extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function detalleDonaciones(){
        return $this->hasMany(DetalleDonaciones::class);

    }
    public function detalleRecepcionTecnicos(){
        return $this->hasMany(DetalleRecepcionTecnicos::class);

    }
    public function detalleEntregaDonaciones(){
        return $this->hasMany(DetalleEntregaDonaciones::class);

    }
    
}
