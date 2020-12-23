<?php

namespace App\Model\manage\kttkkc\chongmygiadinh;

use Illuminate\Database\Eloquent\Model;

class ChongMyGiaDinh extends Model
{
    protected $table = 'chongmygiadinh';
    protected $fillable = [
        'id',
        'loaikt',
        'dhkt',
        'soqd',
        'noitrkhen',
        'sodd',
        'namsinh',
        'chinhquan',
        'cvchohn',
        'loaihskc',
        'tgiantgkc',
        'tgiankcqd',
        'ngaynhap',
        'ghichu',
    ];
}
