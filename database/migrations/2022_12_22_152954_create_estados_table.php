<?php

use App\Models\Estado;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->string('uf');
            $table->string('name');
            $table->timestamps();
       });

           $data = [
                    
                    ['id' => 12, 'uf'=> 'MS','name'=> 'Mato Grosso do Sul'],
                ];            
        Estado::insert($data);        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados');
    }
};