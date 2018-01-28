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
        'kereta_no'
    ];

    public function rute () {
        return $this->hasMany('App\RuteKereta', 'jurusan_id');
    }

    public function kereta () {
        return $this->hasOne('App\Kereta', 'no_kereta', 'kereta_no');
    }

    public function stasiunBerangkat () {
        return $this->hasOne('App\Stasiun', 'kode', 'stasiun_berangkat');
    }

    public function stasiunSampai () {
        return $this->hasOne('App\Stasiun', 'kode', 'stasiun_sampai');
    }

    public static function getAll () {
        $result = [];
        $i = 0;
        $datas = JurusanKereta::get();
        foreach($datas as $data) {
            $result[$i] = $data;
            $time1 = strtotime("1/1/1980 ".$data->waktu_berangkat); 
            $time2 = strtotime("1/1/1980 ".$data->waktu_sampai);
            if ($time2 < $time1) { $time2 = $time2 + 86400; }
            $result[$i]->waktu_tempuh = ($time2 - $time1) / 3600;
            $result[$i]->stasiun_berangkat = JurusanKereta::find($data->id)->stasiunBerangkat->name;
            $result[$i]->stasiun_sampai = JurusanKereta::find($data->id)->stasiunSampai->name;
            $result[$i]->kereta = JurusanKereta::find($data->id)->kereta;
            $result[$i]->rute = JurusanKereta::find($data->id)->rute;
            $i++;
        }
        return $result;
    }
}
