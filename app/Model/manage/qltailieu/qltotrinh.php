<?php

namespace App\model\manage\qltailieu;

use Illuminate\Database\Eloquent\Model;

class qltotrinh extends Model
{
    protected $table = 'qltotrinh';
    protected $fillable = [
        'id',
        'matotrinh',
        'sototrinh',
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
