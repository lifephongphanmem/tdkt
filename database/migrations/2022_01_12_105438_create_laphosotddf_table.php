<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaphosotddfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laphosotddf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('madktdct')->nullable();// mã đăng ký thi đua chi tiết
            $table->string('kihieudhtd')->nullable();// ký hiệu
            $table->string('madt')->nullable();// mã đối tượng
            $table->string('tendanhhieutd')->nullable();// tên danh hiệu thi đua
            $table->string('tenhinhthuckt')->nullable();// tên hình thức thi đua
            $table->string('tenloaihinhkt')->nullable();// tên loại hình khen thưởng
            $table->string('thanhtichkhen')->nullable();// Thành tích khen thưởng
            $table->string('tctang')->nullable();// tính chất tặng
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
        Schema::dropIfExists('laphosotddf');
    }
}
