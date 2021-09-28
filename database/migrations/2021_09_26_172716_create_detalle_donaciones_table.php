<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleDonacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_donaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipo_id');
            $table->unsignedBigInteger('pieza_id');
            $table->unsignedBigInteger('distribuidor_id');
            $table->timestamps();

            
            $table->foreign('equipo_id')->references('id')->on('equipos')->onUpdate('cascade');
            $table->foreign('pieza_id')->references('id')->on('piezas')->onUpdate('cascade');
            $table->foreign('distribuidor_id')->references('id')->on('distribuidores')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_donaciones');
    }
}
