<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dmhinhthuckt extends Model
{
    protected $table = 'dmhinhthuckt';
    protected $fillable = [
        'mahinhthuckt',
        'tenhinhthuckt',
        'phanloai',
        'maxa',
        'mahuyen',
        'ghichu',
        'ttnguoitao',
    ];
}
