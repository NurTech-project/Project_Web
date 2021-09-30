<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function historias(){
        return $this->hasMany(Historias::class);
    }
    public function charlas(){
        return $this->hasMany(User::class);
    }
    public function detalleEntregaDonaciones(){
        return $this->hasMany(DetalleEntregaDonacion::class);
    }
}
