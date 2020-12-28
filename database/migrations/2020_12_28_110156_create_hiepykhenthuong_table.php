<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHiepykhenthuongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hiepykhenthuong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahiepy')->unique();
            $table->string('tendoituong')->nullable();
            $table->string('noidung')->nullable();
            $table->string('ykien')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
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
        Schema::dropIfExists('hiepykhenthuong');
    }
}
