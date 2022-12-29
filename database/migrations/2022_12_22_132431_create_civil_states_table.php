<?php

use App\Models\CivilState;
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
        Schema::create('civil_states', function (Blueprint $table) {
            $table->id();
            $table->string('desc');
            $table->timestamps();
        });

        $data = [

            ['id' => 1, 'desc' => 'Solteiro(a)'],
            ['id' => 2, 'desc' => 'Casado(a)'],
            ['id' => 3, 'desc' => 'Viuvo(a)'],
            ['id' => 4, 'desc' => 'Divorciado(a)'],

        ];
        CivilState::insert($data);
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('civil_states');
    }
};