<?php

namespace App\Model\manage\quytdkt;

use Illuminate\Database\Eloquent\Model;

class qlphieuthuchi extends Model
{
    protected $table = 'qlphieuthuchi';
    protected $fillable = [
        'id',
        'maphieu',
        'ngaythang',
        'noidung',
        'phanloai',
        'nguonhinhthanh',
        'sotien',
        'maxa',
        'mahuyen',
        'ghichu',
        'loaiphieu',
        'ttnguoitao',
    ];
}
