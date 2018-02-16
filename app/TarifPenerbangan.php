<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarifPenerbangan extends Model
{
    protected $primarykey = 'id';
    protected $table = 'tarif_penerbangan';
    protected $fillable = [
        'penerbangan',
        'kelas',
        'tarif'
    ];

    public function penerbangan () {
        return $this->hasOne('App\Penerbangan', 'id', 'penerbangan');
    }
}
