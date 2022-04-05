<?php

namespace App\Model\manage\ktcaccap;

use Illuminate\Database\Eloquent\Model;

class DangKyTd extends Model
{
    protected $table = 'dangkytd';
    protected $fillable = [
        'id',
        'madangkytd',
        'tendanhhieutd',
        'tenhinhthuckt',
        'tendtkt',
        'phucapld',
        'chucdanhld',
        'chucvu',
        'dvdcct',
        'soqd',
        'ngayky',
        'nguoiky',
        'tenloaihinhkt',
        'thanhtichkhen',
        'namsinh',
        'chinhquan',
        'truquan',
        'ghichu',
        'tenqt',
        'macanbo',

        'tctang',
        'nam',
        'trangthai',
        'ngaychuyen',
        'nguoichuyen',
        'ngaynhan',
        'lido',
        'totrinh',
        'qdkt',
        'bienban',
        'tailieukhac',
        'ttthaotac',
        'madonvi',
        'plphongtrao',
        'noidung',
        'slcanhan',
        'sltapthe',
        'tungay',
        'denngay',
        'phamviapdung'
    ];
}
