<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDSDonViTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DSDonVi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('madiaban', 50)->nullable();
            $table->string('madonvi', 50)->unique();
            $table->string('maqhns', 50)->nullable();
            $table->string('tendonvi',100)->nullable();
            $table->string('diachi',100)->nullable();
            $table->string('sodt',50)->nullable();
            $table->string('cdlanhdao',50)->nullable();
            $table->string('lanhdao',50)->nullable();
            $table->string('cdketoan',50)->nullable();
            $table->string('ketoan',50)->nullable();
            $table->double('songuoi')->default(0);
            $table->string('macqcq',50)->nullable();
            $table->string('diadanh',50)->nullable();
            $table->string('nguoilapbieu',50)->nullable();
            $table->string('madvbc',50)->nullable();
            $table->string('capdonvi',50)->nullable();//cấp dư toán 1,2,3,4
            $table->string('caphanhchinh',50)->default('XA');
            $table->string('maphanloai',50)->nullable();
            $table->string('phanloaixa',50)->nullable();
            $table->string('phanloainguon')->nullable();
            $table->string('linhvuchoatdong')->nullable();//lĩnh vực hoạt động
            $table->date('ngaydung')->nullable();
            $table->double('chuyendoi')->default(0);
            $table->string('trangthai')->nullable();
            $table->string('sotk')->nullable();
            $table->string('tennganhang')->nullable();
            $table->string('madinhdanh')->nullable();

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
        Schema::dropIfExists('DSDonVi');
    }
}
