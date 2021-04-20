<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dashboard;

class DashboardController extends Controller
{
    public function index() {
        protected $dates = ['created_at', 'updated_at'];
        protected $table='pc';
        protected $fillable=[
          
           'item_no', 
           'own_no',
            'brand', 
           'model_no', 
           'serial_no',
           'category',
          'date_of_purchase',
           'cpu' ,
          'ram',
          'hdd',
          'user_pc',
           'staff_id',
           'room',
           'locations',
           'purpose', 
          'accessory',
          'checker',
           'remark' 
        ];
    }
}
