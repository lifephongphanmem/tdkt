<?php

namespace App\Model\manage\kttkkc\ktthutuong;

use Illuminate\Database\Eloquent\Model;

class KtThuTuong extends Model
{
    protected $table = 'ktthutuong';
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
