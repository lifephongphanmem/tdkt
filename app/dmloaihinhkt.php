<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dmloaihinhkt extends Model
{
    protected $table = 'dmloaihinhthuckt';
    protected $fillable = [
        'maloaihinhkt',
        'tenloaihinhkt',
        'phanloai',
        'ghichu',
        'ttnguoitao',
    ];
}
