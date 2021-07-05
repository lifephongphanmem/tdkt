<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDangkytdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dangkytd', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kihieudhtd')->unique();
            $table->string('plphongtrao')->nullable();
            $table->string('tendanhhieutd')->nullable();
            $table->string('tenhinhthuckt')->nullable();
            $table->string('tendtkt')->nullable();
            $table->string('phucapld')->nullable();
            $table->string('chucdanhld')->nullable();
            $table->string('chucvu')->nullable();
            $table->string('dvdcct')->nullable();
            $table->string('soqd')->nullable();
            $table->date('ngayky')->nullable();
            $table->string('nguoiky')->nullable();
            $table->string('tenloaihinhkt')->nullable();
            $table->string('thanhtichkhen')->nullable();
            $table->date('namsinh')->nullable();
            $table->string('chinhquan')->nullable();
            $table->string('truquan')->nullable();
            $table->text('ghichu')->nullable();
            $table->string('tenqt')->nullable();
            $table->string('macanbo')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('tctang')->nullable();
            $table->string('nam')->nullable();
            $table->string('trangthai')->nullable();
            $table->date('ngaychuyen')->nullable();
            $table->string('nguoichuyen')->nullable();
            $table->date('ngaynhan')->nullable();
            $table->text('lido')->nullable();
            $table->string('totrinh')->nullable();
            $table->string('qdkt')->nullable();
            $table->string('bienban')->nullable();
            $table->string('tailieukhac')->nullable();
            $table->string('madonvi')->nullable();
            $table->string('ttthaotac')->nullable();
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
        Schema::dropIfExists('dangkytd');
    }
}
