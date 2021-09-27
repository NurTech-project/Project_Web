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
