<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaphosotdTrangthaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laphosotd_trangthai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matrangthai')->unique();
            $table->string('mahoso')->nullable();
            $table->string('trangthai')->nullable();
            $table->date('ngaytrangthai')->nullable();
            $table->string('tencanbo')->nullable();
            $table->string('lydo')->nullable();
            
            $table->string('madonvi_gui')->nullable();
            $table->string('madonvi_nhan')->nullable();
            $table->string('ghichu')->nullable();
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
        Schema::dropIfExists('laphosotd_trangthai');
    }
}
