<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmphanloaiqdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmphanloaiqd', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maplqd')->unique();
            $table->string('tenplqd')->nullable();
            $table->string('madonvi')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('ttnguoitao')->nullable();
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
        Schema::dropIfExists('dmphanloaiqd');
    }
}
