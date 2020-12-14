<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dmdanhhieutd extends Model
{
    protected $table = 'dmdanhhieutd';
    protected $fillable = [
        'madanhhieutd',
        'tendanhhieutd',
        'phanloai',
        'maxa',
        'mahuyen',
        'ghichu',
        'ttnguoitao',
    ];
}
