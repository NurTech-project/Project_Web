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
            $table->unsignedBigInteger('tipo_donacion_id')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->time('hora_entrega')->nullable();
            

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table ->foreign('tipo_donacion_id')->references('id')->on('tipo_donacions')->onUpdate('cascade');
            
            $table->timestamps();
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
