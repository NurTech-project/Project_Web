<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

<<<<<<< HEAD
=======
use Illuminate\Support\Facades\DB;

>>>>>>> e523e9afa72da0dada491e6b9fa6778ee7d0a48a
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
<<<<<<< HEAD
=======
    //Relaciones
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function canton()
    {
        return $this->belongsTo(Canton::class);
    }
    
    public function donante(){
        return $this->hasOne(Donante::class);
    }

    public function beneficiario(){
        return $this->hasOne(Beneficiario::class);
    }

    public function distribuidor(){
        return $this->hasOne(Distribuidor::class);
    }

    public function tecnico(){
        return $this->hasOne(Tecnico::class);
    }

    public function administrador(){
        return $this->hasOne(Administrador::class);
    }

    public function isTecnico()
    {
        $roles=DB::table('roles')->get();
        $users=DB::table('users')->get();
        foreach ($roles as $role)
        {
            foreach ($users as $user){
                if ($this->email == $user->email && 
                $user->role_id == $role->id && $role->descripcion == 'Técnico')
                {
                    return true;
                }
            }
        }
    }

    public function isBeneficiario()
    {
        $roles=DB::table('roles')->get();
        $users=DB::table('users')->get();
        foreach ($roles as $role)
        {
            foreach ($users as $user){
                if ($this->email == $user->email && 
                $user->role_id == $role->id && $role->descripcion == 'Beneficiario')
                {
                    return true;
                }
            }
        }
    }

    public function isDonante()
    {
        $roles=DB::table('roles')->get();
        $users=DB::table('users')->get();
        foreach ($roles as $role)
        {
            foreach ($users as $user){
                if ($this->email == $user->email && 
                $user->role_id == $role->id && $role->descripcion == 'Donante')
                {
                    return true;
                }
            }
        }
    }

    public function isDistribuidor()
    {
        $roles=DB::table('roles')->get();
        $users=DB::table('users')->get();
        foreach ($roles as $role)
        {
            foreach ($users as $user){
                if ($this->email == $user->email && 
                $user->role_id == $role->id && $role->descripcion == 'Distribuidor')
                {
                    return true;
                }
            }
        }
    }

    public function isAdministrador()
    {
        $roles=DB::table('roles')->get();
        $users=DB::table('users')->get();
        foreach ($roles as $role)
        {
            foreach ($users as $user){
                if ($this->email == $user->email && 
                $user->role_id == $role->id && $role->descripcion == 'Administrador')
                {
                    return true;
                }
            }
        }
    }
>>>>>>> e523e9afa72da0dada491e6b9fa6778ee7d0a48a
}
