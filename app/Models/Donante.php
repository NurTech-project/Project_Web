<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donante extends Model
{
    use HasFactory;

    //relaciones
    public function user(){
    return $this->belongsTo(User::class);

    }
    public function equipos(){
    return $this->hasMany(Equipo::class);

    }
    public function piezas(){
    return $this->hasMany(Pieza::class);
        
    }
    public function tipoDonacion(){
    return $this->belongsTo(TipoDonacion::class);
    }
}
