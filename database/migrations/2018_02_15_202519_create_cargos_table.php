<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cargo');
            $table->string('escolaridade');
            $table->integer('pontuacao');
            $table->timestamps();
        });

        Schema::create('cargo_publicacao', function (Blueprint $table) {
            $table->integer('cargo_id')->unsigned();
            $table->integer('publicacao_id')->unsigned();

            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('cascade');
            $table->foreign('publicacao_id')->references('id')->on('publicacoes')->onDelete('cascade');


            $table->primary(['cargo_id','publicacao_id']);
        });

        Schema::create('cargo_user', function (Blueprint $table) {
            $table->integer('cargo_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->primary(['cargo_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargo_user');
        Schema::dropIfExists('cargo_publicacao');
        Schema::dropIfExists('cargos');
    }
}
