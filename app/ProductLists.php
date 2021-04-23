<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductLists extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $table='product_lists';
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
        'bought_date',
    ];
}
