<?php

namespace App\model\manage\hiepy;

use Illuminate\Database\Eloquent\Model;

class qlykien extends Model
{
    protected $table = 'qlykien';
    protected $fillable = [
        'id',
        'mahiepy',
        'ykien',
        'maxa',
        'mahuyen',
        'madonvi',
        'ghichu',
        'ttnguoitao',
    ];
}
