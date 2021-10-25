<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            //Los campos donde se van almacenar las foreign keys
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('canton_id')->nullable();
            $table->string('nombre',50)->nullable();
            $table->string('apellido',50)->nullable();
            $table->string('celular')->nullable();
            $table->string('direccion',50)->nullable();
            $table->string('email',50)->unique();
            $table->string('password');
            $table->boolean('confirmed')->defaul(0);
            $table->string('confirmation_code')->nullable();

            //foreign keys
            $table->foreign('role_id')->references('id')->on('roles')
                    ->onUpdate('cascade');

            $table->foreign('canton_id')->references('id')->on('cantons')
                ->onUpdate('cascade');


            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
