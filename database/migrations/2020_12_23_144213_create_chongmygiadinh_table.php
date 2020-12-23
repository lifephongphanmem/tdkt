<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChongmygiadinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chongmygiadinh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loaikt')->nullable();
            $table->string('dhkt')->nullable();
            $table->string('soqd')->nullable();
            $table->string('noitrkhen')->nullable();
            $table->string('sodd')->nullable();
            $table->date('namsinh')->nullable();
            $table->string('chinhquan')->nullable();
            $table->string('cvchohn')->nullable();
            $table->string('loaihskc')->nullable();
            $table->date('tgiantgkc')->nullable();
            $table->date('tgiankcqd')->nullable();
            $table->date('ngaynhap')->nullable();
            $table->string('ghichu')->nullable();
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
        Schema::dropIfExists('chongmygiadinh');
    }
}
