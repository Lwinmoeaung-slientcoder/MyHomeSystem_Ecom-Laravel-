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
        return redirect()->back()->with('status','Inserted Data Successfully!');
      }

      public function delete($id){
        // $data=Goldquality::find($id)->firstOrFail();
        // $data->delete();
        // $del_data = Goldquality::where('id', '=', $id)->firstOrFail();
        //  $del_data->destroy();
        Goldquality::destroy($id);
        return redirect()->back()->with('status','Deleted Successfully!');
    }

}
