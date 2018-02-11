<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bandara extends Model
{
    protected $table = 'bandara';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode',
        'kota',
        'name'
    ];
}
