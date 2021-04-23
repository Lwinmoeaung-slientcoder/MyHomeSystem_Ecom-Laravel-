<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goldquality extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $table='goldqualities';
    protected $fillable = [
        'goldquality',
    ];
}
