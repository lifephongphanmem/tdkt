<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dmtieuchuandhtd extends Model
{
    protected $table = 'dmtieuchuandhtd';
    protected $fillable = [
        'id',
        'stt',
        'matieuchuandhtd',
        'tentieuchuandhtd',
        'madanhhieutd',
        'cancu',
        'ghichu',
        'ttnguoitao',
    ];
}
