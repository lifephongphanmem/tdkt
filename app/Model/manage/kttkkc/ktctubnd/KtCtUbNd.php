<?php

namespace App\Model\manage\kttkkc\ktctubnd;

use Illuminate\Database\Eloquent\Model;

class KtCtUbNd extends Model
{
    protected $table = 'ktctubnd';
    protected $fillable = [
        'id',
        'loaikt',
        'dhkt',
        'hinhthuckt',
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
