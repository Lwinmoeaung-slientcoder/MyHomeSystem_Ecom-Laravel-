<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductListsRequest;
use App\Http\Requests\SalesProductRequest;
use App\SaleProducts;
use App\ProductLists;
use App\Goldquality;
use App\Exports\SaleProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class SaleProductsController extends Controller
{

    public function index(){
        $saledata = SaleProducts::all();
        return view('pages.Products.saleproducts', compact('saledata'));
      }

    public function movesalelistscreen($id){
        $goldqualitydata = $goldqualitydata = Goldquality::all();
        $products=ProductLists::whereId($id)->firstorFail();
      return view('pages.Products.move_productstosalelists', compact(['products','goldqualitydata']));
  }

  public function editscreen($id){
    $goldqualitydata = $goldqualitydata = Goldquality::all();
    $products=SaleProducts::whereId($id)->firstorFail();
  return view('pages.Products.edit_salesproducts', compact(['products','goldqualitydata']));
}

    public function edit(SalesProductRequest $request,$id){
        $products=SaleProducts::whereId($id)->firstorFail();
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
        $products->total_cost   = $request->get('total_cost');
        $products->sold_date  = $request->get('sold_date');
        $products->update();
        return redirect()->back()->with('status','အောင်မြင်စွာပြင်ပြီးပါပြီ');
      }

      public function add(SalesProductRequest $request,$id){
        SaleProducts::create([
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
            'total_cost'    => $request->get('total_cost'),
            'sold_date'     => $request->get('sold_date'),
        ]);
        $result=ProductLists::where('id','=',$id);
        $result->delete();
        $productsdata = ProductLists::all();
        session()->flash('status', 'အရောင်းစာရင်းသို့ရွှေ့လိုက်လိုက်ပါပြီ');
        return view('pages.Products.productlists')->with('productsdata',$productsdata);
        }

      public function delete($id){
        $result=SaleProducts::where('id','=',$id);
        $result->delete();
        return redirect()->back()->with('status','အောင်မြင်စွာဖျက်လိုက်ပါပြီ');
    }
    public function export() 
    {
      
        $date=date('Ymd');
        $filepath='C:/My Home System/';
        $file='/SalesProductsList/AMK_'.  $date.'SaleProductsList.xlsx';
        $temp;
        $countFile=0;
        $totalfiles=glob($filepath . "*");
      
        if(file_exists('C:/My Home System/'.$file)) { 
            $countFile = count($totalfiles);
            $temp='/SalesProductsList/AMK_'.  $date.'SaleProductsList('.$countFile.').xlsx';
            $file=$temp;
            Excel::store(new SaleProductsExport, $file,'real_public', \Maatwebsite\Excel\Excel::XLSX);
         return redirect()->back()->with('excel', 'Export Successfully (Path=> C:/MY Home System/) ');
        } else {
            Excel::store(new SaleProductsExport, $file,'real_public', \Maatwebsite\Excel\Excel::XLSX);
         return redirect()->back()->with('excel', 'Export Successfully (Path=> C:/MY Home System/)');
        }
    }
}