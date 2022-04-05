<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaphosotdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laphosotd', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahoso')->unique();    
            $table->date('ngayhoso')->nullable();   
            $table->string('noidung')->nullable();            
            $table->string('phanloaihoso')->nullable();
            //File đính kèm
            $table->string('totrinh')->nullable();
            $table->string('qdkt')->nullable();
            $table->string('bienban')->nullable();
            $table->string('tailieukhac')->nullable();
            //
            $table->string('ttthaotac')->nullable();
            $table->string('madonvi', 50)->nullable();
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
        Schema::dropIfExists('laphosotd');
    }
}
