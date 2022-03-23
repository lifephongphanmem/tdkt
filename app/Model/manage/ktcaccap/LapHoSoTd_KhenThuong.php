<?php

namespace App\Model\manage\ktcaccap;

use Illuminate\Database\Eloquent\Model;

class LapHoSoTd_KhenThuong extends Model
{
    protected $table = 'laphosotd_khenthuong';
    protected $fillable = [
        'id',
        'stt',
        'kihieudhtd',
        'madonvi',
        'madanhhieutd',
        'phanloai',
        'madonvi',
        //Thông tin cá nhân
        'madt',
        'maccvc',
        'tendt',
        'ngaysinh',
        'gioitinh',
        'chucvu',
        'lanhdao',
        //Thông tin tập thể
        'madonvi_kt',
        'tendonvi',
        'ghichu',
        //Kết quả đánh giá
        'ketqua',
        'lydo',
    ];
}
