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
        Schema::create('obs_profissionals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('perfusoes_id');
            $table->foreign('perfusoes_id')->references('id')->on('pe_perfusao');
            $table->string('pressaoPD');
            $table->string('pressaoPE');
            $table->string('monofilamentoPD');
            $table->string('monofilamentoPE');
            $table->string('dermatologicasPD');
            $table->string('dermatologicasPE');
            $table->string('ungueaisPD');
            $table->string('ungueaisPE');
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
        Schema::dropIfExists('obs_profissionals');
    }
};