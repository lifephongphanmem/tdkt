<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DSTaiKhoan extends Model
{
    protected $table = 'DSTaiKhoan';
    protected $fillable = [
        'tentaikhoan',
        'username',
        'password',
        'madonvi',
        'phone',
        'email',
        'trangthai',
        'sadmin',
        'permission',
        'ttnguoitao',
        'lydo',
        'solandn',
        //tách nhóm chức năng
        'nhaplieu',
        'tonghop',
        'hethong',
        'chucnangkhac'
    ];
}
