<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function detalleRecepcionTecnicos(){
        return $this->hasMany(DetalleRecepcionTecnico::class);
    }
}
