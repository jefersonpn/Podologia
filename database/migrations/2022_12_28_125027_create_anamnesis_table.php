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
        Schema::create('anamnesis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pacient_id');
            $table->foreign('pacient_id')->references('id')->on('pacients');
            $table->string('profession');
            $table->string('sockType');
            $table->string('shoeType');
            $table->string('legsSurgery');
            $table->string('sport');
            $table->string('medicine');
            $table->string('painSensitivity');
            $table->string('pregnant');
            $table->string('paceMaker')->default('0');
            $table->string('pino')->default('0');
            $table->string('highPressure')->default('0');
            $table->string('seizures')->default('0');
            $table->string('diabetes')->default('0');
            $table->string('carcinogenic')->default('0');
            $table->string('circulatory')->default('0');
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
        Schema::dropIfExists('anamnesis');
    }
};