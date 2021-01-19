<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajesClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes_cliente', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');
            $table->string('asunto');
            $table->longText('mensaje');
            $table->bigInteger('user_id')->nullable();

            $table->foreignId('clientes_id')
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
        Schema::dropIfExists('mensajes_cliente');
    }
}
