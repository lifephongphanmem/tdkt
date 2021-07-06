<?php

namespace App\model\manage\qltailieu;

use Illuminate\Database\Eloquent\Model;

class qlbienban extends Model
{
    protected $table = 'qlbienban';
    protected $fillable = [
        'id',
        'mabienban',
        'sobienban',
        'ngaythang',
        'veviec',
        'noikhenthuong',
        'phongtrao',
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
