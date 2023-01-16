<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string('razaoSocial');
            $table->string('nomeFantasia');
            $table->string('cnpj')->nullable();
            $table->string('email')->nullable();
            $table->string('matrizFilial');
            $table->string('dataFundacao');
            $table->string('mei')->nullable();
            $table->string('porte')->nullable();
            $table->string('simplesNacional')->nullable();
            $table->string('situacao')->nullable();
            $table->string('dataSituacao')->nullable();
            $table->string('inscricaoEstadual')->nullable();
            $table->string('inscricaoMunicipal')->nullable();
            $table->string('telefone')->nullable();
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->unsignedBigInteger('cidade_id');
            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->string('endereco');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('cep')->nullable();
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
        Schema::dropIfExists('fornecedors');
    }
};