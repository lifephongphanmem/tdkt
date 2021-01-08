<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dmquoctich extends Model
{
    protected $table = 'dmquoctich';
    protected $fillable = [
        'maqt',
        'tenqt',
        'ghichu',
        'ttnguoitao',
    ];
}
