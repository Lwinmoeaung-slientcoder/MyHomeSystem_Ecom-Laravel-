<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleProducts extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $table='sale_products';
    protected $fillable = [
        'name',
        'goldquality',
        'shopname',
        'kyat',
        'pel',
        'yway',
        'ayaw',
        'k_price',
        'k_kyat',
        'k_pel',
        'k_yway',
        'total_cost',
        'sold_date',
    ];
}
