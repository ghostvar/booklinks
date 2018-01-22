<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JurusanKereta extends Model
{
    protected $primarykey = 'id';
    protected $table = 'jurusan_kereta';
    protected $fillable = [
        'stasiun_berangkat',
        'stasiun_sampai',
        'waktu_berangkat',
        'waktu_sampai',
        'kereta_id'
    ];
}
