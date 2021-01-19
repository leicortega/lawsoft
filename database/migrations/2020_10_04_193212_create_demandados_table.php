<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandados', function (Blueprint $table) {
            $table->id();

            $table->string('tipo');
            $table->string('nombre', 120);
            $table->bigInteger('identificacion')->nullable();
            $table->integer('verificacion')->nullable();
            $table->bigInteger('telefono')->nullable();
            $table->string('correo', 160)->nullable();
            $table->string('direccion')->nullable();

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
        Schema::dropIfExists('demandados');
    }
}
