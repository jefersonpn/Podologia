<?php

use App\Models\Perfusao;
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

        $data = [

            ['id' => 1, 'desc' => 'Normal'],
            ['id' => 2, 'desc' => 'Pálido'],
            ['id' => 3, 'desc' => 'Cianótico'],
            ['id' => 4, 'desc' => 'Com Edema'],

        ];
        Perfusao::insert($data);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfusoes');
    }
};