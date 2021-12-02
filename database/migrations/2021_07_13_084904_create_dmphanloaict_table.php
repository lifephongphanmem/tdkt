<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmphanloaictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmphanloaict', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maplct')->unique();
            $table->string('mapl')->nullable();
            $table->string('tenplct')->nullable();
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
        Schema::dropIfExists('dmphanloaict');
    }
}
