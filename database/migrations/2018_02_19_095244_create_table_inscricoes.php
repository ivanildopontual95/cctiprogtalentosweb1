<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInscricoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomeCompleto');
            $table->date('dataNascimento');
            $table->string('pai');
            $table->string('mae');
            $table->string('sexo');
            $table->string('escolaridade');
            $table->string('identidade');
            $table->string('cpf')->unique();
            $table->string('estado');
            $table->string('cidade');
            $table->string('endereco');
            $table->string('cep');
            $table->string('bairro');
            $table->string('numero');
            $table->string('email')->unique();
            $table->string('telefone');
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
        Schema::dropIfExists('inscricoes');
    }
}
