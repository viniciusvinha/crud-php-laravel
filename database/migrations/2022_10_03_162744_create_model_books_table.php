<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    /**
     * 
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) { //nossa tabela book vai fazer referência a tabela users
            $table->increments('id'); // primarykey será auto incrementada
            $table->integer('id_user')->unsigned(); //O unsigned significa sem sinal. No caso do Laravel, quando declaramos na migração increments, se for MySQL, será criado uma chave primária inteira sem sinal, por isso as chaves estrangeiras devem ser unsigned.
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); //porque se deletarmos ou atualizarmos um usuário ele fara isso para a tabela de book também
            $table->string('title');
            $table->integer('pages');
            $table->double('price', 10,2);
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
        Schema::dropIfExists('book');
    }
}
