<?php

namespace App\model\manage\qldoituong;

use Illuminate\Database\Eloquent\Model;

class dmphanloaict extends Model
{
    protected $table = 'dmphanloaict';
    protected $fillable = [
        'id',
        'maplct',
        'mapl',
        'tenplct',
        'ghichu',
        'madonvi',
        'ttnguoitao',
    ];
}