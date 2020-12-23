<?php

namespace App\Model\manage\kttkkc\chongphapcanhan;

use Illuminate\Database\Eloquent\Model;

class ChongPhapCaNhan extends Model
{
    protected $table = 'chongphapcanhan';
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
