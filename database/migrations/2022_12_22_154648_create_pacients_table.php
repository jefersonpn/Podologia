<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('phone')->unique();
            $table->string('dob');
            $table->unsignedBigInteger('civilState_id');
            $table->foreign('civilState_id')->references('id')->on('civil_states');
            $table->string('email')->unique();
            $table->unsignedBigInteger('sex_id');
            $table->foreign('sex_id')->references('id')->on('sexes');
            $table->unsignedBigInteger('estado_id');
            $table
                ->foreign('estado_id')
                ->references('id')
                ->on('estados');
            $table->unsignedBigInteger('cidade_id');
            $table
                ->foreign('cidade_id')
                ->references('id')
                ->on('cidades');
            $table->string('address');
            $table->string('number');
            $table->string('cap');
            $table->integer('anamnese')->default(0)->nullable();
            $table->integer('obsProf')->default(0)->nullable();
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
        Schema::dropIfExists('pacients');
    }
};