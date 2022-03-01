<?php

namespace App\model\manage\ktcaccap;

use Illuminate\Database\Eloquent\Model;

class laphosotdct extends Model
{
    protected $table = 'laphosotdct';
    protected $fillable =[
        'id',
        'madktdct',
        'kihieudhtd',
        'madt',
        'tendanhhieutd',
        'tenhinhthuckt',
        'tenloaihinhkt',
        'thanhtichkhen',
        'tctang'
    ];
}
