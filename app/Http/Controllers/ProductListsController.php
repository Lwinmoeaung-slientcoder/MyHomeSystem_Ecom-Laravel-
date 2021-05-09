<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductListsRequest;
use App\Http\Requests\SalesProductRequest;
use App\ProductLists;
use App\Goldquality;
use App\Exports\ProductListsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductListsController extends Controller
{
    public function index(){
        $productsdata = ProductLists::all();
        return view('pages.Products.productlists', compact('productsdata'));
      }

      public function addnewscreen(){
          $goldqualitydata = $goldqualitydata = Goldquality::all();
        return view('pages.Products.addproducts', compact('goldqualitydata'));
     
    }
     

      public function insert(ProductListsRequest $request){
        ProductLists::create([
            'name'          => $request->get('name'),
            'goldquality'   => $request->get('goldquality'),
            'shopname'      => $request->get('shopname'),
            'kyat'          => $request->get('kyat'),
            'pel'           => $request->get('pel'),
            'yway'          => $request->get('yway'),
            'ayaw'          => $request->get('ayaw'),
            'k_price'       => $request->get('k_price'),
            'k_kyat'        => $request->get('k_kyat'),
            'k_pel'         => $request->get('k_pel'),
            'k_yway'        => $request->get('k_yway'),
            'bought_date'   => $request->get('bought_date'),
        ]);
        return redirect()->back()->with('status','အောင်မြင်စွာထည့်ပြီးပါပြီ');
      }

      public function editscreen($id){
        $goldqualitydata = $goldqualitydata = Goldquality::all();
        $products=ProductLists::whereId($id)->firstorFail();
      return view('pages.Products.editproduct', compact(['products','goldqualitydata']));
   
  }
      public function edit(Request $request,$id){
        $products=ProductLists::whereId($id)->firstorFail();
        $products->name         = $request->get('name');
        $products->goldquality  = $request->get('goldquality');
        $products->shopname     = $request->get('shopname');
        $products->kyat         = $request->get('kyat');
        $products->pel          = $request->get('pel');
        $products->yway         = $request->get('yway');
        $products->ayaw         = $request->get('ayaw');
        $products->k_price      = $request->get('k_price');
        $products->k_kyat       = $request->get('k_kyat');
        $products->k_pel        = $request->get('k_pel');
        $products->k_yway       = $request->get('k_yway');
        $products->bought_date  = $request->get('bought_date');
        $products->update();
        return redirect()->back()->with('status','အောင်မြင်စွာပြင်ပြီးပါပြီ');
      }

      public function delete($product_id){
        $result=ProductLists::where('id','=',$product_id);
        $result->delete();
        return redirect()->back()->with('status','အောင်မြင်စွာဖျက်လိုက်ပါပြီ');
    }
    public function export() 
    {
      
        $date=date('Ymd');
        $filepath='C:/My Home System/';
        $file='/ProductLists/AMK_'.  $date.'ProductLists.xlsx';
        $temp;
        $countFile=0;
        $totalfiles=glob($filepath . "*");
      
        if(file_exists('C:/My Home System/'.$file)) { 
            $countFile = count($totalfiles);
            $temp='/ProductLists/AMK_'.  $date.'_ProductLists('.$countFile.').xlsx';
            $file=$temp;
            Excel::store(new ProductListsExport, $file,'real_public', \Maatwebsite\Excel\Excel::XLSX);
         return redirect()->back()->with('excel', 'Export Successfully  (Path=> C:/MY Home System/)');
        } else {
            Excel::store(new ProductListsExport, $file,'real_public', \Maatwebsite\Excel\Excel::XLSX);
         return redirect()->back()->with('excel', 'Export Successfully (Path=> C:/MY Home System/)');
        }
    }
}
