<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesawat extends Model
{
    protected $table = 'pesawat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'kode',
        'type_pesawat',
        'exec_seat_num',
        'busines_seat_num',
        'eco_seat_num'
    ];
}
