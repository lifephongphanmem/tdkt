<?php

namespace App\Model\manage\ktcaccap;

use Illuminate\Database\Eloquent\Model;

class LapHoSoTd extends Model
{
    protected $table = 'laphosotd';
    protected $fillable = [
        'id',
        'mahoso',
        'ngayhoso',
        'noidung',
        'phanloaihoso',
        //File đính kèm
        'totrinh',
        'qdkt',
        'bienban',
        'tailieukhac',
        //
        'ttthaotac',
        'madonvi',
    ];
}
