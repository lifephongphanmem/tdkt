<?php

namespace App\Model\manage\ktcaccap;

use Illuminate\Database\Eloquent\Model;

class LapHoSoTd_TieuChuan extends Model
{
    protected $table = 'laphosotd_tieuchuan';
    protected $fillable = [
        'id',
        'stt',
        'kihieudhtd',
        'madanhhieutd',
        'matieuchuandhtd',
        'madt',
        'madonvi',
        'madonvi_kt',
        'dieukien',
        'mota',
        'ghichu',
        'ipf1',
        'ipf2',
        'ipf3',
        'ipf4',
        'ipf5',
    ];
}
