<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDangkytdTieuchuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dangkytd_tieuchuan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->string('kihieudhtd')->nullable();// ký hiệu
            $table->string('madanhhieutd')->nullable();
            $table->string('matieuchuandhtd')->nullable();
            $table->string('tentieuchuandhtd')->nullable();
            $table->string('cancu')->nullable();
            $table->string('ghichu')->nullable();
            $table->boolean('batbuoc')->default(0);
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
        Schema::dropIfExists('dangkytd_tieuchuan');
    }
}
