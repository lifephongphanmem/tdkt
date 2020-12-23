<?php

namespace App\Model\manage\kttkkc\kyniemchuong;

use Illuminate\Database\Eloquent\Model;

class KyNiemChuong extends Model
{
    protected $table = 'kyniemchuong';
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
