<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarifKereta extends Model
{
    protected $primarykey = 'id';
    protected $table = 'tarif_kereta';
    protected $fillable = [
        'kereta',
        'kelas',
        'tarif'
    ];

    public function kereta () {
        return $this->hasOne('App\JurusanKereta', 'id', 'kereta');
    }
}
