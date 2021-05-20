<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Users;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class UsersController extends Controller
{
      public function show()
      {
          $userdata = User::paginate(4);
          return view('auth.register', compact('userdata'));
       }

      public function delete($id)
      {
          User::destroy($id);
          return redirect()->back()->with('status','အောင်မြင်စွာဖျက်လိုက်ပါပြီ!');
     }

    public function editscreen(Request $request,$id)
    {
      $userdata = User::paginate(4);
          $users=User::whereId($id)->firstorFail();
          $request->session()->put('editvalue', 'edit');
          return view('auth.register', compact(['userdata','users']));
  
  }

    public function edit(Users $request,$id)
    { 
          $users=User::whereId($id)->firstorFail();
          $users->name         = $request->get('name');
          $users->email        = $request->get('email');
          $users->password     = Hash::make($request->get('password'));
          $users->role         = $request->get('role');
          $users->update();
          $request->session()->forget('editvalue');
          $userdata = User::paginate(4);
          session()->flash('status', 'အောင်မြင်စွာပြင်လိုက်ပါပြီ');
          return view('auth.register', compact('userdata'));
    }
    
    public function add(Users $request)
    {
               User::create([
                    'name'    => $request->name,
                    'email'   => $request->email,
                    'password'=> Hash::make($request->password),
                    'role'    => $request->role
                    ]);
    
                return redirect()->back()->with('status','အောင်မြင်ထည့်လိုက်ပါပြီ!');
    }

    public function updatescreen(Request $request,$id)
    {
          $users=User::whereId($id)->firstorFail();
          return view('auth.changepassword', compact('users'));
  
  }
    public function p_update(Users $request,$id)
    { 
          $users=User::whereId($id)->firstorFail();
          $users->name         = $request->get('name');
          $users->email        = $request->get('email');
          $users->password     = Hash::make($request->get('password'));
          $users->role         = $request->get('role');
          $users->update();
          return redirect()->back()->with('status','အောင်မြင်စွာပြင်လိုက်ပါပြီ!');
    }

    public function logout()
    {
      Auth::logout();
      return redirect('/');
    }
    
}
