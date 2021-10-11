<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleDonacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_donacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipo_id')->nullable();
            $table->unsignedBigInteger('pieza_id')->nullable();
            $table->unsignedBigInteger('distribuidor_id')->nullable();
            $table->string('estado')->nullable();
            
            $table->foreign('equipo_id')->references('id')->on('equipos')->onUpdate('cascade');
            $table->foreign('pieza_id')->references('id')->on('piezas')->onUpdate('cascade');
            $table->foreign('distribuidor_id')->references('id')->on('distribuidors')->onUpdate('cascade');

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
        Schema::dropIfExists('detalle_donacions');
    }
}
