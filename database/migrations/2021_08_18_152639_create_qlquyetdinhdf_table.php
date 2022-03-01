<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQlquyetdinhdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qlquyetdinhdf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('madt')->nullable();
            $table->string('maquyetdinh')->nullable();
            $table->string('tendt')->nullable();
            $table->date('ngaysinh')->nullable();
            $table->string('gioitinh')->nullable();
            $table->string('diachi')->nullable();
            $table->string('nguyenquan')->nullable();
            $table->string('truquan')->nullable();
            $table->string('phanloai')->nullable();
            $table->string('phanloaict')->nullable();
            $table->string('madinhdanh')->nullable();
            $table->string('madonvi')->nullable();
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
        Schema::dropIfExists('qlquyetdinhdf');
    }
}
