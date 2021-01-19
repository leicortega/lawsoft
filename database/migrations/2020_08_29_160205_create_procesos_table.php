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

            $table->string('codigo', 4)->nullable();
            $table->string('num_proceso', 15);
            $table->string('tipo', 30);
            $table->string('sub_tipo', 60)->nullable();
            $table->string('tipo_insolvencia', 40)->nullable();
            $table->string('departamento', 90);
            $table->string('ciudad', 90);
            $table->longtext('descripcion')->nullable();
            $table->string('proceso_file', 120)->nullable();
            $table->string('contrato', 120)->nullable();
            $table->string('poder', 120)->nullable();
            $table->string('titulo_valor', 120)->nullable();

            $table->string('radicado')->nullable();
            $table->string('juzgado')->nullable();
            $table->string('juez')->nullable();
            $table->string('direccion')->nullable();
            $table->bigInteger('telefono')->nullable();
            $table->string('correo')->nullable();

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
