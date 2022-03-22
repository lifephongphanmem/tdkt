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
            $table->string('kihieudhtd')->unique();// ký hiệu
            $table->string('plphongtrao')->nullable();// phong trào
            $table->string('tendanhhieutd')->nullable();// tên danh hiệu thi đua
            $table->string('tenhinhthuckt')->nullable();// tên hình thức thi đua
            $table->string('tendtkt')->nullable();// tên đối tượng khen thưởng
            $table->string('phucapld')->nullable();// phụ cấp lãnh đạo
            $table->string('chucdanhld')->nullable();// chức danh lãnh đạo
            $table->string('chucvu')->nullable();// chức vụ
            $table->string('dvdcct')->nullable();// đơn vị - địa chỉ công tác
            $table->string('soqd')->nullable();// Số quyết định
            $table->date('ngayky')->nullable();// Ngày ký - ngày đăng ký
            $table->string('nguoiky')->nullable();// Người ký
            $table->string('tenloaihinhkt')->nullable();// tên loại hình khen thưởng
            $table->string('thanhtichkhen')->nullable();// Thành tích khen thưởng
            $table->date('namsinh')->nullable();// Năm sinh
            $table->string('chinhquan')->nullable();// Chính quán - Quê quán
            $table->string('truquan')->nullable();// Trú quán
            $table->text('ghichu')->nullable();// ghi chú
            $table->string('tenqt')->nullable();// Tên quốc tịch
            $table->string('macanbo')->nullable();// Mã cán bộ
            $table->string('maxa')->nullable();// Mã xã
            $table->string('mahuyen')->nullable();// mã huyện
            $table->string('tctang')->nullable();// tính chất tặng
            $table->string('nam')->nullable();// Năm
            $table->string('trangthai')->nullable();// trạng thái
            $table->date('ngaychuyen')->nullable();// Ngày chuyển
            $table->string('nguoichuyen')->nullable();// Người chuyển
            $table->date('ngaynhan')->nullable();// Ngày nhận
            $table->text('lido')->nullable();// Lý do
            $table->string('totrinh')->nullable();// Tờ trình
            $table->string('qdkt')->nullable();// Quyết định
            $table->string('bienban')->nullable();// Biên bản
            $table->string('phamviapdung')->nullable();//
            $table->string('tailieukhac')->nullable();// Tài liệu khác
            $table->string('madonvi')->nullable();// Mã đơn vị
            $table->string('ttthaotac')->nullable();// Thông tin thao tác
            // Bổ sung theo Quảng Bình

            $table->date('tungay')->nullable();// Ngày bắt đầu nhận hồ so
            $table->date('denngay')->nullable();// Ngày kết thúc nhận hồ sơ
            $table->string('noidung')->nullable();
            $table->double('slcanhan')->default(0);
            $table->double('sltapthe')->default(0);

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
