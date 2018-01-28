<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RuteKereta extends Model
{
    protected $table = 'rute_kereta';
    protected $primarykey = 'id';
    protected $fillable = [
        'stasiun_berangkat',
        'stasiun_sampai',
        'waktu_berangkat',
        'waktu_sampai',
        'urutan_jalur'
    ];
}
