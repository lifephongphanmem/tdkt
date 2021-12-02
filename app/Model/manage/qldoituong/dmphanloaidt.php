<?php

namespace App\model\manage\qldoituong;

use Illuminate\Database\Eloquent\Model;

class dmphanloaidt extends Model
{
    protected $table = 'dmphanloaidt';
    protected $fillable = [
        'id',
        'mapl',
        'tenpl',
        'ghichu',
        'madonvi',
        'ttnguoitao',
    ];
}
