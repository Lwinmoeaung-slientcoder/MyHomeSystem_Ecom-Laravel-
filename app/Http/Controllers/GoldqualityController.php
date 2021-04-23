<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goldquality;

class GoldqualityController extends Controller
{
    public function index(){
        $goldqualitydata = Goldquality::paginate(4);
        return view('pages.Gold_Quality.goldquality', compact('goldqualitydata'));
      }

      public function insert(Request $request){
        Goldquality::create([
            'goldquality' => $request->get('goldquality'),
        ]);
        return redirect()->back()->with('status','အောင်မြင်စွာထည့်ပြီးပါပြီ');
      }

      public function delete($id){
        Goldquality::destroy($id);
        return redirect()->back()->with('status','အောင်မြင်စွာဖျက်လိုက်ပါပြီ!');
    }

}
