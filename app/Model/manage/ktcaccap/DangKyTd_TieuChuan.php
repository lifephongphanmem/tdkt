<?php

namespace App\Model\manage\ktcaccap;

use Illuminate\Database\Eloquent\Model;

class DangKyTd_TieuChuan extends Model
{
    protected $table = 'dangkytd_tieuchuan';
    protected $fillable = [
        'id',
        'stt',
        'kihieudhtd',
        'madanhhieutd',
        'matieuchuandhtd',
        'tentieuchuandhtd',
        'cancu',
        'ghichu',
        'batbuoc',
        'ttnguoitao',
    ];
}
