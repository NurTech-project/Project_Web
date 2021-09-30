<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);  
    }

    public function detalleEntregaDonaciones(){
        return $this->hasMany(DetalleEntregaDonacion::class);
       }
}
