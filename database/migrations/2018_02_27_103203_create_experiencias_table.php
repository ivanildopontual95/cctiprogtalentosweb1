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
            $table->integer('inscricao_id')->unsigned();
            $table->string('empresa')->nullable();
            $table->string('funcao')->nullable();
            $table->string('atividade')->nullable();
            $table->date('dataInE')->nullable();
            $table->date('dataTermE')->nullable();
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
        Schema::dropIfExists('experiencias');
    }
}
