<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detalle_recepcion_id')->nullable();
            $table->unsignedBigInteger('tecnico_id')->nullable();
            $table->string('detalle',300);
            $table->string('estado')->nullable();

            $table->foreign('detalle_recepcion_id')-> references('id')-> on('detalle_recepcion_tecnicos')->onUpdate('cascade');
            $table->foreign('tecnico_id')-> references('id')-> on('tecnicos')->onUpdate('cascade');

            
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
        Schema::dropIfExists('diagnosticos');
    }
}
