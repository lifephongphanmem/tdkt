<?php

namespace App\Model\manage\quytdkt;

use Illuminate\Database\Eloquent\Model;

class qlphieuthu extends Model
{
    protected $table = 'qlphieuthu';
    protected $fillable = [
        'id',
        'maphieuthu',
        'ngaythang',
        'noidung',
        'phanloai',
        'nguonhinhthanh',
        'sotien',
        'maxa',
        'mahuyen',
        'ghichu',
        'ttnguoitao',
    ];
}
