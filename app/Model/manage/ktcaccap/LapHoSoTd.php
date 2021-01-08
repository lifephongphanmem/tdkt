<?php

namespace App\Model\manage\ktcaccap;

use Illuminate\Database\Eloquent\Model;

class LapHoSoTd extends Model
{
    protected $table = 'laphosotd';
    protected $fillable = [
        'id',
        'kihieudhtd',
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
        'maxa',
        'mahuyen',
        'tctang',
        'nam',
        'trangthai',
        'trangthaihuyen',
        'ngaychuyen',
        'ngươichuyen',
        'ngaynhan',
        'lido',
        'totrinh',
        'qdkt',
        'bienban',
        'tailieukhac',
        'ttthaotac',
    ];
}
