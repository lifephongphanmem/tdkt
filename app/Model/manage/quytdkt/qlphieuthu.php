<?php

namespace App\Model\manage\quytdkt;

use Illuminate\Database\Eloquent\Model;

class qlphieuthu extends Model
{
    protected $table = 'qlphieuthu';
    protected $fillable = [
        'id',
        'maphieuthu',
        'noidung',
        'phanloai',
        'nguonhinhthanh',
        'maxa',
        'mahuyen',
        'ghichu',
        'ttnguoitao',
    ];
}
