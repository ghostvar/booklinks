<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JurusanKereta extends Model
{
    protected $primarykey = 'id';
    protected $table = 'jurusan_kereta';
    protected $fillable = [
        'kereta_no'
    ];
    protected $hidden = ['kereta_no'];

    public function rute () {
        return $this->hasMany('App\RuteKereta', 'jurusan_id');
    }

    public function kereta () {
        return $this->hasOne('App\Kereta', 'no_kereta', 'kereta_no');
    }
}
