<?php

namespace App\Model\manage\ktcaccap;

use Illuminate\Database\Eloquent\Model;

class dangkytddf extends Model
{
    protected $table = 'dangkytddf';
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
