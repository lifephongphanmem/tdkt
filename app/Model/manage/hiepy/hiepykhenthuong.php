<?php

namespace App\Model\manage\hiepy;

use Illuminate\Database\Eloquent\Model;

class hiepykhenthuong extends Model
{
    protected $table = 'hiepykhenthuong';
    protected $fillable = [
        'id',
        'mahiepy',
        'tendoituong',
        'noidung',
        'ykien',
        'maxa',
        'mahuyen',
        'ghichu',
        'ttnguoitao',
    ];
}
