<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dashboard;
use App\ProductLists;
use App\Goldquality;
use App\User;
use App\SaleProducts;

class DashboardController extends Controller
{
    public function index() {
        $products=ProductLists::count();
        $saledata = SaleProducts::count();
        $users=User::count();
        $total_amount=SaleProducts::sum('total_cost');
      return view('dashboard', compact(['products','saledata','users','total_amount']));
    }
}
