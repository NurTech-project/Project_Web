<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleEntregaDonacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_entrega_donacions', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_entrega')->nullable();
            $table->time('hora_entrega')->nullable();
            $table->string('estado_distribuidor')->nullable();
            $table->string('estado_beneficiario')->nullable();
            $table->string('estado_tecnico')->nullable();
            $table->unsignedBigInteger('administrador_id')->nullable();
            $table->unsignedBigInteger('beneficiario_id')->nullable();
            $table->unsignedBigInteger('distribuidor_id')->nullable();
            $table->unsignedBigInteger('diagnostico_id')->nullable();

            $table->foreign('administrador_id')-> references('id')-> on('administradors')->onUpdate('cascade');
            $table->foreign('beneficiario_id')-> references('id')-> on('beneficiarios')->onUpdate('cascade');
            $table->foreign('distribuidor_id')-> references('id')-> on('distribuidors')->onUpdate('cascade');
            $table->foreign('diagnostico_id')-> references('id')-> on('diagnosticos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_entrega_donacions');
    }
}
