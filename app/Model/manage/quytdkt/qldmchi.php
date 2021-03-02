<?php

namespace App\Model\manage\quytdkt;

use Illuminate\Database\Eloquent\Model;

class qldmchi extends Model
{
    protected $table = 'qldmchi';
    protected $fillable = [
        'id',
        'madmchi',
        'noidung',
        'phanloai',
        'sotien',
        'maxa',
        'mahuyen',
        'ghichu',
        'ttnguoitao',
    ];
}
