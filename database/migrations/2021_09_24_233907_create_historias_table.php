<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('administrador_id');
<<<<<<< HEAD
            $table->string('imagen');
            $table->string('descripcion');
            $table->timestamps();

            $table->foreign('administrador_id')->references('id')->on('administradores')->onUpdate('cascade');
=======
            $table->string('imagen')->nullable();
            $table->string('descripcion',300);
           
            $table->foreign('administrador_id')->references('id')->on('administradors')->onUpdate('cascade');

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
        Schema::dropIfExists('historias');
    }
}
