<?php

namespace App\Model\manage\qltailieu;

use Illuminate\Database\Eloquent\Model;

class qlquyetdinhct extends Model
{
    protected $table = 'qlquyetdinhct';
    protected $fillable = [
        'id',
        'madt',
        'maquyetdinh',
        'tendt',
        'ngaysinh',
        'gioitinh',
        'diachi',
        'nguyenquan',
        'truquan',
        'phanloai',
        'phanloaict',
        'madinhdanh',
        'madonvi',
        'ttnguoitao',
    ];
}
