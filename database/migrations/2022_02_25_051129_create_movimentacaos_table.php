<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacao', function (Blueprint $table) {
            $table->id();
            $table->enun('tipo_movimentacao', ['entrada', 'saida']);
            $table->decimal('valor', 8,2);
            $table->string('observacao', 255);
            $table->dateTime('data_criacao')->nullable();
            $table->unsignedBigInteger('funcionario_id');
            $table->unsignedBigInteger('administrador_id');

            $table->foreign('funcionario_id')->references('id')->on('funcionario');
            $table->foreign('administrador_id')->references('id')->on('administrador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimentacao');
    }
}
