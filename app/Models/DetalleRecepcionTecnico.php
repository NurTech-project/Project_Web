<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleRecepcionTecnico extends Model
{
    use HasFactory;

    public function detalleDonacion(){
      return $this->belongsTo(DetalleDonacion::class);
  }

    public function distribuidor(){
        return $this->belongsTo(Distribuidor::class);
       }
    
    public function tecnico(){
      return $this->belongsTo(Tecnico::class);
    }

    public function diagnosticos(){
      return $this->hasMany(Diagnostico::class);
     }

}
