<?php

namespace App\model\manage\ktcaccap;

use Illuminate\Database\Eloquent\Model;

class laphosotddf extends Model
{
    protected $table = 'laphosotddf';
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
