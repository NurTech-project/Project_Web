<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
<<<<<<< HEAD
            $table->string('descripcion');
            $table->string('estado');
            $table->string('prioridad');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
=======
            $table->string('descripcion',150);
            $table->string('estado')->nullable();
            $table->string('prioridad',50);

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');

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
        Schema::dropIfExists('beneficiarios');
    }
}
