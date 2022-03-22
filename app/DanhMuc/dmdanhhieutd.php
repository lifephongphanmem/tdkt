<?php

namespace App\DanhMuc;

use Illuminate\Database\Eloquent\Model;

class dmdanhhieutd extends Model
{
    protected $table = 'dmdanhhieutd';
    protected $fillable = [
        'id',
        'stt',
        'madanhhieutd',
        'tendanhhieutd',
        'phanloai',
//        'maxa',
//        'mahuyen',
        'ghichu',
        'ttnguoitao',
        'apdung'
    ];
}
