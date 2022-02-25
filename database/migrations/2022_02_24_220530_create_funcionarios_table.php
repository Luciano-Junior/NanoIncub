<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo',255);
            $table->string('login');
            $table->string('senha');
            $table->decimal('saldo_atual',8,2);
            $table->unsignedBigInteger('administrador_id');
            $table->dateTime('data_criacao')->nullable();
            $table->dateTime('data_alteracao')->nullable();

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
        Schema::dropIfExists('funcionario');
    }
}
