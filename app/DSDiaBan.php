<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DSDiaBan extends Model
{
    protected $table = 'DSDiaBan';
    protected $fillable = [
        'id',
        'madiaban',
        'tendiaban',
        'capdo',
        'madonviQL',
        'madiabanQL',
        'ghichu',
    ];
}
