<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDSTaiKhoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DSTaiKhoan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tentaikhoan')->nullable();
            $table->string('username')->unique();
            $table->string('password')->nullable();
            $table->string('madonvi')->nullable();
            $table->string('email')->nullable();
            $table->integer('trangthai')->default(0);
            $table->string('sadmin')->nullable();
            $table->text('permission')->nullable();
            $table->string('ttnguoitao')->nullable();
            $table->text('lydo')->nullable();
            $table->integer('solandn')->default(1);
            //chia nhóm chức năng
            $table->boolean('nhaplieu')->default(0);
            $table->boolean('tonghop')->default(0);
            $table->boolean('hethong')->default(0);
            $table->boolean('chucnangkhac')->default(0);
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
        Schema::drop('DSTaiKhoan');
    }
}
