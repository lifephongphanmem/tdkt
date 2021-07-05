<?php

namespace App\Model\manage\vbpl;

use Illuminate\Database\Eloquent\Model;

class qlhoidap extends Model
{
    protected $table = 'qlhoidap';
    protected $fillable = [
        'id',
        'mahoidap',
        'madonvi',
        'ngaythang',
        'noidung',
        'phanloai',
        'donvinhan',
        'cautraloi',
        'trangthai',
        'nguoichuyen',
        'ngaychuyen',
        'nguoitraloi',
        'ngaytraloi',
        'maxa',
        'mahuyen',
        'ghichu',
        'loaiphieu',
        'ngaynhan',
        'lido',
        'ttnguoitao',
    ];
}
