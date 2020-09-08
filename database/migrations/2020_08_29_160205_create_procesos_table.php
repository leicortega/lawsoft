<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->id();

            $table->string('num_proceso', 15);
            $table->string('tipo', 20);
            $table->string('sub_tipo', 20)->nullable();
            $table->string('departamento', 90);
            $table->string('ciudad', 90);
            $table->longtext('descripcion')->nullable();
            $table->string('proceso_file', 120);

            $table->foreignId('clientes_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('users_id')
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
        Schema::dropIfExists('procesos');
    }
}
