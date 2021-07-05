<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name',
        'username',
        'password',
        'madonvi',
        'phone',
        'email',
        'status',
        'maxa',
        'mahuyen',
        'town',
        'district',
        'cqcq',
        'level',
        'sadmin',
        'permission',
        'emailxt',
        'question',
        'answer',
        'ttnguoitao',
        'lydo'
    ];
}
