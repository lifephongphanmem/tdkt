<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeThongChung extends Model
{
    protected $table = 'HeThongChung';
    protected $fillable = [
        'id',
        'phanloai',
        'tendonvi',
        'maqhns',
        'diachi',
        'dienthoai',
        'thutruong',
        'ketoan',
        'nguoilapbieu',
        'diadanh',
        'setting',
        'thongtinhd',
        'emailql',
        'tendvhienthi',
        'tendvcqhienthi',
        'ipf1',
        'ipf2',
        'ipf3',
        'ipf4',
        'ipf5',
        'solandn',
    ];
}
