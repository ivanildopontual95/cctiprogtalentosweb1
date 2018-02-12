<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDocumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->nullable();
            $table->string('url');
            $table->timestamps();
        });

        Schema::create('documento_publicacao', function (Blueprint $table) {
            $table->integer('documento_id')->unsigned();
            $table->integer('publicacao_id')->unsigned();

            $table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade');
            $table->foreign('publicacao_id')->references('id')->on('publicacoes')->onDelete('cascade');


            $table->primary(['documento_id','publicacao_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documento_publicacao');
        Schema::dropIfExists('documentos');
    }
}
