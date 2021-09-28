<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleEntregaDonacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_entrega_donaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('administrador_id');
            $table->unsignedBigInteger('beneficiario_id');
            $table->unsignedBigInteger('distribuidor_id');
            $table->unsignedBigInteger('diagnostico_id');
            $table->string('estado');
            $table->timestamps();

            $table->foreign('administrador_id')->references('id')->on('administradores')->onUpdate('cascade');
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios')->onUpdate('cascade');

            $table->foreign('distribuidor_id')->references('id')->on('distribuidores')->onUpdate('cascade');
            $table->foreign('diagnostico_id')->references('id')->on('diagnosticos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_entrega_donaciones');
    }
}
