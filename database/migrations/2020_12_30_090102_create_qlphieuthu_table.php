<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQlphieuthuchiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qlphieuthuchi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maphieu')->unique();
            $table->date('ngaythang')->nullable();
            $table->string('noidung')->nullable();
            $table->string('phanloai')->nullable();
            $table->string('nguonhinhthanh')->nullable();
            $table->double('sotien')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('loaiphieu')->nullable();
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
        Schema::dropIfExists('qlphieuthuchi');
    }
}
