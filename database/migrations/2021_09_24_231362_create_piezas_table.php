<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiezasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piezas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donante_id');
<<<<<<< HEAD
            $table->string('nombre');
            $table->string('detalle');
            $table->string('estado');
            $table->timestamps();

            $table->foreign('donante_id')->references('id')-> on('donantes')->onUpdate('cascade');
=======
            $table->string('nombre',150);
            $table->string('detalle',150);
            $table->string('estado')->nullable();
            
            $table->foreign('donante_id')->references('id')->on('donantes')->onUpdate('cascade');

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
        Schema::dropIfExists('piezas');
    }
}
