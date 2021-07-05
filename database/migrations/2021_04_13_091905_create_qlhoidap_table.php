<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQlhoidapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qlhoidap', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahoidap')->unique();
            $table->string('madonvi')->nullable();
            $table->date('ngaythang')->nullable();
            $table->longText('noidung')->nullable();
            $table->string('phanloai')->nullable();
            $table->string('donvinhan')->nullable();
            $table->longText('cautraloi')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('nguoichuyen')->nullable();
            $table->date('ngaychuyen')->nullable();
            $table->string('nguoitraloi')->nullable();
            $table->date('ngaytraloi')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('ghichu')->nullable();
            $table->date('ngaynhan')->nullable();
            $table->string('lido')->nullable();
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
        Schema::dropIfExists('qlhoidap');
    }
}
