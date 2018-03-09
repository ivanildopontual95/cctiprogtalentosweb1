<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQualificacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualificacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inscricao_id')->unsigned();
            $table->string('instituicao');
            $table->string('curso');
            $table->date('dataInI');
            $table->date('dataTermI');
            $table->string('cargaHora');
            $table->foreign('inscricao_id')->references('id')->on('inscricoes')->onDelete('cascade');
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
        Schema::dropIfExists('qualificacoes');
    }
}
