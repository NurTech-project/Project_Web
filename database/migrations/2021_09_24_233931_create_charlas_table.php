<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharlasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charlas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('administrador_id');
<<<<<<< HEAD
            $table->string('link_video');
            $table->string('descripcion');
            $table->timestamps();

            $table->foreign('administrador_id')->references('id')->on('administradores')->onUpdate('cascade');
=======
            $table->string('link_video')->nullable();
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
        Schema::dropIfExists('charlas');
    }
}
