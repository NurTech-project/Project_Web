<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEntregaDonacion extends Model
{
    use HasFactory;

    public function administrador(){
        return $this->belongsTo(Administrador::class);
    }

    public function beneficiario(){
        return $this->belongsTo(Beneficiario::class);
    }

    public function distribuidor(){
        return $this->belongsTo(Distribuidor::class);
    }

    public function diagnostico(){
        return $this->belongsTo(Diagnostico::class);
    }

}
