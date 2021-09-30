<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    use HasFactory;
    public function donante(){
        return $this->belongsTo(Donante::class);
    }
    public function detalleDonaciones(){
        return $this->hasMany(DetalleDonacion::class);
    }
}
