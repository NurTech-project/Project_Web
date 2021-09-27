<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleDonacion extends Model
{
    use HasFactory;

    public function distribuidores(){
        return $this->belongsTo(Distribuidor::class);
    }

    public function equipos(){
        return $this->belongsTo(Equipo::class);
    }
    
    public function piezas(){
        return $this->belongsTo(Pieza::class);
    }

    public function detalleRecepcionTecnicos(){
        return $this->hasMany(DetalleRecepcionTecnico::class);
    }

}
