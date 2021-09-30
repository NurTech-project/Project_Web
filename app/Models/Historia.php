<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    use HasFactory;

    public function administrador(){
     return $this->belongsTo(Administrador::class);
    }
}
