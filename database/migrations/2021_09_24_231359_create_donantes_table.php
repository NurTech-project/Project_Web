<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
<<<<<<< HEAD
            $table->unsignedBigInteger('tipo_donacion_id');
            $table->date('fecha_entrega');
            $table->time('hora_entrega');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table ->foreign('tipo_donacion_id')->references('id') ->on('tipo_donaciones')->onUpdate('cascade');
            
=======
            $table->unsignedBigInteger('tipo_donacion_id')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->time('hora_entrega')->nullable();
            

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table ->foreign('tipo_donacion_id')->references('id')->on('tipo_donacions')->onUpdate('cascade');
            
            $table->timestamps();
>>>>>>> f970313c289b55d6fa7dd1e0b738778672534ccd
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donantes');
    }
}
