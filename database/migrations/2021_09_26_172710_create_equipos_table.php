<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donante_id');
            $table->string('sistema_operativo');
            $table->string('procesador');
            $table->string('ram');
            $table->string('almacenamiento');
            $table->string('detalle');
            $table->string('estado');
            $table->timestamps();

            $table->foreign('donante_id')->references('id')->on('donantes')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
