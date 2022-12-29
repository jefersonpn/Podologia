<?php

use App\Models\Sex;
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
        Schema::create('sexes', function (Blueprint $table) {
            $table->id();
            $table->string('desc');
            $table->timestamps();
        });

        $data = [

            ['id' => 1, 'desc' => 'Masculino'],
            ['id' => 2, 'desc' => 'Feminino'],

        ];
        Sex::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sexes');
    }
};