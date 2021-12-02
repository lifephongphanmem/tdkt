<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dmphanloaiqd extends Model
{
    protected $table = 'dmphanloaiqd';
    protected $fillable = [
        'id',
        'maplqd',
        'tenplqd',
        'ghichu',
        'madonvi',
        'ttnguoitao',
    ];
}