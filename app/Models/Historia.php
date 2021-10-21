<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Historia extends Model
{
    use HasFactory;

    /*public static function historiaMensaje(){
        //return $this->belongsTo(Administrador::class);
        //return "historias";
        $historias = DB::table('historias')
                    ->select('*')
                    ->get();
            return $historias;
    }*/
    public function administrador(){
        return $this->belongsTo(Administrador::class);
    }
}
