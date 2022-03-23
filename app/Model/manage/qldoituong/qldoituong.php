<?php

namespace App\Model\manage\qldoituong;

use Illuminate\Database\Eloquent\Model;

class qldoituong extends Model
{
    protected $table = 'qldoituong';
    protected $fillable = [
        'id',
        'madt',
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
        'tendonvi',
        'maccvc',
        'chucvu',
        'lanhdao',
        'kihieudhtd',
        'madanhhieutd',
    ];
}
