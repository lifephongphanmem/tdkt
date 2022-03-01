<?php

namespace App\Model\manage\ktcaccap;

use Illuminate\Database\Eloquent\Model;

class dangkytdct extends Model
{
    protected $table = 'dangkytdct';
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
