<?php

namespace App\Model\manage\ktcaccap;

use Illuminate\Database\Eloquent\Model;

class DangKyTd_KhenThuong extends Model
{
    protected $table = 'dangkytd_khenthuong';
    protected $fillable = [
        'id',
        'stt',
        'madangkytd',
        'madanhhieutd',
        'tendanhhieutd',
        'phanloai',
        'tenhinhthuckt',
        'tenloaihinhkt',
        'thanhtichkhen',
        'tctang',
        'soluong',
        'sotien',
        'ghichu',
    ];
}
