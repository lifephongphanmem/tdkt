<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DSDonVi extends Model
{
    protected $table = 'DSDonVi';
    protected $fillable = [
        'id',
        'madiaban',
        'madonvi',
        'maqhns',
        'tendonvi',
        'diachi',
        'sodt',
        'cdlanhdao',
        'lanhdao',
        'cdketoan',
        'ketoan',
        'songuoi',
        'macqcq',
        'diadanh',
        'nguoilapbieu',
        'madvbc',
        'capdonvi',//cấp dư toán 1,2,3,4
        'caphanhchinh',
        'maphanloai',
        'phanloaixa',
        'phanloainguon',
        'linhvuchoatdong',
        'ngaydung',
        'chuyendoi',
        'trangthai',
        'sotk',
        'tennganhang',
        'madinhdanh',

    ];
}
