<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaphosotdKhenthuongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laphosotd_khenthuong', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->string('kihieudhtd')->nullable();
            $table->string('madanhhieutd')->nullable();
            $table->string('phanloai')->nullable();
            //Thông tin cá nhân
            $table->string('madt')->nullable();
            $table->string('maccvc')->nullable();
            $table->string('tendt')->nullable();
            $table->date('ngaysinh')->nullable();
            $table->string('gioitinh')->nullable();
            $table->string('chucvu')->nullable();
            $table->boolean('lanhdao')->nullable();
            //Thông tin tập thể
            $table->string('madonvi')->nullable();
            $table->string('tendonvi')->nullable();
            $table->string('ghichu')->nullable();//
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
        Schema::dropIfExists('laphosotd_khenthuong');
    }
}
