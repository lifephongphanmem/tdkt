<?php

namespace App\Model\manage\qltailieu;

use Illuminate\Database\Eloquent\Model;

class qlphongtrao extends Model
{
    protected $table = 'qlphongtrao';
    protected $fillable = [
        'id',
        'maphongtrao',
        'sophongtrao',
        'ngaythang',
        'veviec',
        'noidung',
        'phanloai',
        'dieu1',
        'dieu2',
        'dieu3',
        'sotien',
        'maxa',
        'mahuyen',
        'ghichu',
        'ttnguoitao',
        'madonvi',
    ];
}
