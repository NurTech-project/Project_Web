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
            $table->string('link_video')->nullable();
            $table->string('descripcion',300);

            $table->foreign('administrador_id')->references('id')->on('administradors')->onUpdate('cascade');

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
        Schema::dropIfExists('charlas');
    }
}
