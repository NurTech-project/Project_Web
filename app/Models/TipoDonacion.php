<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDonacion extends Model
{
    use HasFactory;

    public function donante(){
        return $this->hasMany(Donante::class);
    }
}
