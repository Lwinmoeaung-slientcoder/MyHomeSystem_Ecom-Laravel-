<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductListsRequest;
use App\Http\Requests\SalesProductRequest;
use App\SaleProducts;
use App\ProductLists;
use App\Goldquality;

class SaleProductsController extends Controller
{

    public function index(){
        $saledata = SaleProducts::all();
        return view('pages.Products.saleproducts', compact('saledata'));
      }

    public function editscreen($id){
        $goldqualitydata = $goldqualitydata = Goldquality::all();
        $products=ProductLists::whereId($id)->firstorFail();
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
        $products->total_cost      = $request->get('total_cost');
        $products->bought_date  = $request->get('sold_date');
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
        return view('pages.Products.productlists')->with(compact('productsdata'),['status'=>'အရောင်းစာရင်းထဲထည့်လိုက်ပါပြီ']);
     
     
        }

      public function delete($id){
        $result=SaleProducts::where('id','=',$id);
        $result->delete();
        return redirect()->back()->with('status','အောင်မြင်စွာဖျက်လိုက်ပါပြီ');
    }

}