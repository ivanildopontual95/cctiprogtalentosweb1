<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empresa');
            $table->string('funcao');
            $table->string('atividade');
            $table->date('dataInE');
            $table->date('dataTermE');
            $table->string('instituicao');
            $table->string('curso');
            $table->date('dataInI');
            $table->date('dataTermI');
            $table->string('cargaHora');
            $table->string('aptidao');
            $table->timestamps();
        });

        Schema::create('experiencia_inscricao', function (Blueprint $table) {
            $table->integer('experiencia_id')->unsigned();
            $table->integer('inscricao_id')->unsigned();

            $table->foreign('experiencia_id')->references('id')->on('experiencias')->onDelete('cascade');
            $table->foreign('inscricao_id')->references('id')->on('inscricoes')->onDelete('cascade');


            $table->primary(['experiencia_id','inscricao_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiencia_inscricao');
        Schema::dropIfExists('experiencias');
    }
}
