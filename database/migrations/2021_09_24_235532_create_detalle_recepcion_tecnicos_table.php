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
