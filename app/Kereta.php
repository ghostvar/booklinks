<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kereta extends Model
{
    protected $table = 'kereta';
    protected $primaryKey = 'id';
    protected $fillable = [
        'eco_seat_num',
        'busines_seat_num',
        'exec_seat_num',
        'no_kereta',
        'name'
    ];
}
