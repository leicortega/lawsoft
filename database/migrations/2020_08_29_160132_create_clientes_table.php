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

            $table->string('tipo_cliente');
            $table->bigInteger('identificacion');
            $table->integer('verificacion')->nullable();
            $table->string('nombre', 120);
            $table->string('direccion', 120);
            $table->bigInteger('telefono')->nullable();
            $table->bigInteger('celular')->nullable();
            $table->string('correo', 150);
            $table->string('correo_dos', 150)->nullable();
            // Info Representante
            $table->bigInteger('identificacion_representante')->nullable();
            $table->string('nombre_representante', 120)->nullable();
            $table->string('direccion_representante', 120)->nullable();
            $table->bigInteger('celular_representante')->nullable();

            $table->string('cedula', 150)->nullable();
            $table->string('contrato', 150)->nullable();
            $table->string('poder', 150)->nullable();
            $table->string('titulo_valor', 150)->nullable();
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
