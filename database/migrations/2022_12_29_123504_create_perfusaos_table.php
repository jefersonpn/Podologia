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
        Schema::create('perfusoes', function (Blueprint $table) {
            $table->id();
            $table->string('desc');
            $table->timestamps();
        });

        Schema::create('pe_perfusao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pacient_id')->constrained('pacients');
            $table->foreignId('pe_id')->constrained('pes');
            $table->foreignId('perfusao_id')->constrained('perfusoes');
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
        Schema::dropIfExists('perfusaos');
    }
};