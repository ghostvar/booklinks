<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerbangan extends Model
{
    protected $table = 'penerbangan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_penerbangan',
        'asal',
        'tujuan',
        'waktu_berangkat',
        'waktu_sampai',
        'pesawat_id'
    ];
    protected $hidden = [
        'pesawat_id'
    ];

    public function pesawat () {
        return $this->hasOne('App\Pesawat', 'id', 'pesawat_id');
    }

    public function asal () {
        return $this->hasOne('App\Bandara', 'kode', 'asal');
    }

    public function tujuan () {
        return $this->hasOne('App\Bandara', 'kode', 'tujuan');
    }
}
