<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\{Product, Inventory};
use App\Models\Orders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(){
           $inventories=Inventory::with('product')->get();
          $products=Product::get();
            return view('dashboard.inventory',[
            'products'=>$products,
            'inventories'=>$inventories
             
    ]);
    }

    public function store(Request $request){
      // return $request->data;
      $dataNlines = preg_split('/\r\n|\r|\n/', $request->data);
      foreach ($dataNlines as $key => $dataNline) {
        $inventory = new Inventory();
        $inventory->product_id            =      $request->product_id;
        $inventory->uid                   =      random_int(100, 999);
        $inventory->data                  =      $dataNline;
        $inventory->status                =      $request->status;
        $inventory->save();
      }
           
           return redirect()->back()->with('message','inventory Create Successfully');
    }

    public function edit($id){
      $inventory=Inventory::with('product')->find($id);
      return view('inventory.edit',['inventory'=>$inventory]);
    }
  public function update(Request $request){
     $invetory=Inventory::find($request->id);
     $invetory->product_id              =        $request->product_id;
     $invetory->data                    =        $request->data;
     $invetory->status                  =        $request->status;
     $invetory->save();
     return redirect()->back()->with('message','inventory update Successfully');
     
  }
  public function trash($id){
    //  $inventory=Inventory::with('product')->find($id);
    $inventory=Inventory::find($id);
     $inventory->delete();
    return redirect()->back()->with('message','inventory delete Successfully');
  }
}
