<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'booking';
    protected $fillable = [
        'kode_boking',
        'pelanggan',
        'status',
        'status_pembayaran',
        'kereta',
        'penerbangan'
    ];

    public function pelanggan () {
        return $this->hasOne('App\Pelanggan', 'id', 'pelanggan');
    }

    public function kereta () {
        return $this->hasOne('App\TarifKereta', 'id', 'kereta');
    }

    public function penerbangan () {
        return $this->hasOne('App\TarifPenerbangan', 'id', 'penerbangan');
    }
}
