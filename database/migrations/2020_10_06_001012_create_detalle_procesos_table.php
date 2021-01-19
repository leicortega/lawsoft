<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_procesos', function (Blueprint $table) {
            $table->id();

            $table->enum('tipo', ['Demandante', 'Demandado']);

            $table->foreignId('abogados_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('demandados_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('procesos_id')
                ->constrained()
                ->onDelete('cascade');

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
        Schema::dropIfExists('detalle_procesos');
    }
}
