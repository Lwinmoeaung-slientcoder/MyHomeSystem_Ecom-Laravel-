<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dashboard;
use App\ProductLists;
use App\Goldquality;
use App\User;

class DashboardController extends Controller
{
    public function index() {
        $products=ProductLists::count();
        $users=User::count();
      return view('dashboard', compact(['products','users']));
    }
}
