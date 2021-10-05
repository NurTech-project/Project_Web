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
<<<<<<< HEAD
            $table->string('sistema_operativo');
            $table->string('procesador');
            $table->string('ram');
            $table->string('almacenamiento');
            $table->string('detalle');
            $table->string('estado');
            $table->timestamps();

            $table->foreign('donante_id')->references('id')-> on('donantes')->onUpdate('cascade');
=======
            $table->string('sistema_operativo',50);
            $table->string('procesador',100);
            $table->string('ram',100);
            $table->string('almacenamiento',100);
            $table->string('detalle',200);
            $table->string('estado')->nullable();
            
            $table->foreign('donante_id')->references('id')-> on('donantes')->onUpdate('cascade');

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
        Schema::dropIfExists('equipos');
    }
}
