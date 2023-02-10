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
            $table->unsignedBigInteger('pacient_id');
            $table->foreign('pacient_id')->references('id')->on('pacients')->onDelete('cascade');
            $table->string('pressaoPD');
            $table->string('pressaoPE');
            $table->string('monofilamentoPD');
            $table->string('monofilamentoPE');
            $table->string('dermatologicasPD');
            $table->string('dermatologicasPE');
            $table->string('ungueaisPD');
            $table->string('ungueaisPE');
            $table->longText('procedimentoProf');
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