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
            $table->string('paceMaker');
            $table->string('pino');
            $table->string('highPressure');
            $table->string('seizures');
            $table->string('diabetes');
            $table->string('carcinogenic');
            $table->string('circulatory');
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