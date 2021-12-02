<?php

namespace App\Model\manage\qltailieu;

use Illuminate\Database\Eloquent\Model;

class qlquyetdinhdf extends Model
{
    protected $table = 'qlquyetdinhdf';
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
