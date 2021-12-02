<?php

namespace App\model\manage\qltailieu;

use Illuminate\Database\Eloquent\Model;

class qlquyetdinh extends Model
{
    protected $table = 'qlquyetdinh';
    protected $fillable = [
        'id',
        'maquyetdinh',
        'soquyetdinh',
        'mahinhthuckt',
        'doituong',
        'mapl',
        'maplct',
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
