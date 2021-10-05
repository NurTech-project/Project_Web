<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('ciudad_id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('celular');
            $table->string('direccion');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            // Referencia hacia las foreing Key

            $table->foreign('role_id')-> references('id')-> on('roles')->onUpdate('cascade');
            $table->foreign('ciudad_id')-> references('id')-> on('ciudades')->onUpdate('cascade');
        });
    }
            
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
