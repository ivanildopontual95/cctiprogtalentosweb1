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
            $table->string('instituicao')->nullable();
            $table->string('curso')->nullable();
            $table->date('dataInI')->nullable();
            $table->date('dataTermI')->nullable();
            $table->string('cargaHora')->nullable();
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
