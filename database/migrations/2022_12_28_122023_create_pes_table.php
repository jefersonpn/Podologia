<?php

use App\Models\Pe;
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
        Schema::create('pes', function (Blueprint $table) {
            $table->id();
            $table->string('lado');
            $table->timestamps();
        });

        $data = [

            ['id' => 1, 'lado' => 'Pé Direito, Planar'],
            ['id' => 2, 'lado' => 'Pé Esquerdo, Planar'],
            ['id' => 3, 'lado' => 'Pé Direito, Dorsal'],
            ['id' => 4, 'lado' => 'Pé Esquerdo, Dorsal'],
            
        ];
        Pe::insert($data);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pes');
    }
};