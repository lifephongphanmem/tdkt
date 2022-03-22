<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaphosotdTieuchuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laphosotd_tieuchuan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->string('kihieudhtd')->nullable();// ký hiệu
            $table->string('madanhhieutd')->nullable();
            $table->string('matieuchuandhtd')->nullable();
            $table->string('madt')->nullable();
            $table->string('madonvi')->nullable();
            $table->boolean('dieukien')->default(0);
            $table->string('mota')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('ipf1')->nullable();
            $table->string('ipf2')->nullable();
            $table->string('ipf3')->nullable();
            $table->string('ipf4')->nullable();
            $table->string('ipf5')->nullable();
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
        Schema::dropIfExists('laphosotd_tieuchuan');
    }
}
