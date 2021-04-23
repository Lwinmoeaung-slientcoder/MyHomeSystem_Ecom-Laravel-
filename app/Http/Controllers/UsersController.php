<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersController extends Controller
{
  
      public function delete($id){
        User::destroy($id);
        return redirect()->back()->with('status','အောင်မြင်စွာဖျက်လိုက်ပါပြီ!');
    }
}
