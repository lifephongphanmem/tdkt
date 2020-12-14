<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dmtieuchuandhtd extends Model
{
    protected $table = 'dmtieuchuandhtd';
    protected $fillable = [
        'matieuchuandhtd',
        'tentieuchuandhtd',
        'maxa',
        'mahuyen',
        'ghichu',
        'ttnguoitao',
    ];
}
