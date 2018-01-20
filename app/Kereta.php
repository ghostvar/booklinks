<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kereta extends Model
{
    protected $table = 'kereta';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];
}
