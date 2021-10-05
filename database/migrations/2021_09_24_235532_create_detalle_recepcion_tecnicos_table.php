<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleRecepcionTecnicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_recepcion_tecnicos', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->unsignedBigInteger('tecnico_id');
            $table->unsignedBigInteger('distribuidor_id');
            $table->unsignedBigInteger('detalle_donacion_id');
            $table->date('fecha');
            $table->time('hora');
            $table->string('estado');
            $table->timestamps();

            $table->foreign('tecnico_id')->references('id')->on('tecnicos')->onUpdate('cascade');
            $table->foreign('distribuidor_id')->references('id')->on('distribuidores')->onUpdate('cascade');
            $table->foreign('detalle_donacion_id')->references('id')->on('detalle_donaciones')->onUpdate('cascade');
=======
            $table->unsignedBigInteger('tecnico_id')->nullable();
            $table->unsignedBigInteger('distribuidor_id')->nullable();
            $table->unsignedBigInteger('detalle_donacion_id')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->string('estado')->nullable();

            $table->foreign('tecnico_id')->references('id')->on('tecnicos')->onUpdate('cascade');
            $table->foreign('distribuidor_id')->references('id')->on('distribuidors')->onUpdate('cascade');
            $table->foreign('detalle_donacion_id')->references('id')->on('detalle_donacions')->onUpdate('cascade');

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
        Schema::dropIfExists('detalle_recepcion_tecnicos');
    }
}
