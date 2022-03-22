<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDangkytdKhenthuongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dangkytd_khenthuong', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->string('kihieudhtd')->nullable();// ký hiệu
            $table->string('madanhhieutd')->nullable();
            $table->string('tendanhhieutd')->nullable();// tên danh hiệu thi đua
            $table->string('tenhinhthuckt')->nullable();// tên hình thức thi đua
            $table->string('tenloaihinhkt')->nullable();// tên loại hình khen thưởng
            $table->string('thanhtichkhen')->nullable();// Thành tích khen thưởng
            $table->string('tctang')->nullable();// tính chất tặng
            $table->integer('soluong')->nullable();// số lượng giải thưởng, khen thưởng
            $table->double('sotien')->nullable();// số tiền (tương đương )
            $table->string('phanloai')->nullable();//phân loại danh hiệu thi đua
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
        Schema::dropIfExists('dangkytd_khenthuong');
    }
}
