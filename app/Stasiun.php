<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stasiun extends Model
{
    protected $table = 'stasiun';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode',
        'kota',
        'name'
    ];
}
