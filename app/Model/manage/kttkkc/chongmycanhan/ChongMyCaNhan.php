<?php

namespace App\Model\manage\kttkkc\chongmycanhan;

use Illuminate\Database\Eloquent\Model;

class ChongMyCaNhan extends Model
{
    protected $table = 'chongmycanhan';
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
