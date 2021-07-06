<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQlbienbanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qlbienban', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mabienban')->unique();
            $table->string('sobienban')->nullable();
            $table->date('ngaythang')->nullable();
            $table->string('veviec')->nullable();
            $table->string('noikhenthuong')->nullable();
            $table->string('phongtrao')->nullable();
            $table->string('phanloai')->nullable();//phân loại phong trào cấp xã, huyện, tỉnh
            $table->text('dieu1')->nullable();
            $table->text('dieu2')->nullable();
            $table->text('dieu3')->nullable();
            $table->double('sotien')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('ttnguoitao')->nullable();
            $table->string('madonvi')->nullable();
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
        Schema::dropIfExists('qlbienban');
    }
}
