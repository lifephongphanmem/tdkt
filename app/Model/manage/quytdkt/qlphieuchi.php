<?php

namespace App\Model\manage\quytdkt;

use Illuminate\Database\Eloquent\Model;

class qlphieuchi extends Model
{
    protected $table = 'qlphieuchi';
    protected $fillable = [
        'id',
        'maphieuchi',
        'ngaythang',
        'noidung',
        'phanloai',
        'sotien',
        'maxa',
        'mahuyen',
        'ghichu',
        'madonvi',
        'ttnguoitao',
    ];
}
