<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JalurKereta extends Model
{
    protected $table = 'jalur_kereta';
    protected $primarykey = 'id';
    protected $fillable = [
        'jalur_awal',
        'jalur_akhir',
        'urutan_jalur',
        'waktu_berangkat',
        'waktu_sampai'
    ];
}
