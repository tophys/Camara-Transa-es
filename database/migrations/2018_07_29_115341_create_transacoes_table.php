<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('transacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('projeto', 250);
            $table->date('competencia');
            $table->date('data_execucao');
            $table->string('grupo', 250);
            $table->string('objetivo', 250);
            $table->string('fornecedor', 250);
            $table->string('descricao', 250);
            $table->date('data_documento');
            $table->string('numero_cheque', 250);
            $table->string('numero_ted', 250);
            $table->string('numero_boleto', 250);
            $table->string('numero_recibo_simples', 250);
            $table->string('numero_nota_fiscal', 250);
            $table->date('data_pagamento');
            $table->double('valor_entrada', 8, 2)->nullable();
            $table->double('valor_saida', 8, 2)->nullable();
            $table->string('nome_banco', 250);
            $table->string('numero_conta', 250);
            $table->boolean('ativo');
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
        Schema::dropIfExists('transacoes');
    }
}
