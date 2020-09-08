<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('identificacion');
            $table->string('nombre', 120);
            $table->string('direccion', 120);
            $table->bigInteger('telefono');
            $table->string('correo', 150);
            $table->string('cedula', 150)->nullable();
            $table->string('eps', 150)->nullable();
            $table->string('arl', 150)->nullable();
            $table->string('afp', 150)->nullable();

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
        Schema::dropIfExists('clientes');
    }
}
