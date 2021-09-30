<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ]; 

    //Relaciones
    public function role(){
      return $this->belongsTo(Role::class);  
    } 
    
    public function canton(){
      return $this->belongsTo(Canton::class);
    }
    
    public function donante(){
      return $this->hasOne(Donante::class);
    }

    public function beneficiario(){
     return $this->hasOne(Beneficiario::class);
    }

    public function tecnico(){
     return $this->hasOne(Tecnico::class);
    }

    public function distribuidor(){
     return $this->hasOne(Distribuidor::class);
    }

    public function administrador(){
    return $this->hasOne(Administrador::class);
    }
}
