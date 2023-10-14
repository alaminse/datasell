<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Product;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function index(){
    //     return view('dashboard.addNewProduct');
    // }
    public function index()
    {
        $products = Product::get();
        return view('backend.product.index', compact('products'));
    }
    public function store(Request $request){
        $imageurl='';


        $product_image              =$request->file('product_image');
        $imagetype                  =$product_image ->getClientOriginalExtension();
        $imageName                  =time().'.'.$imagetype;
        $directory                  ='productimage/';
        $product_image->move($directory,$imageName);
        $imageurl=$directory.$imageName;

        $product=new Product();
        $product->product_uid      =   random_int(100, 999);
        $product->product_name             =   $request->product_name;
        $product->product_pcs	           =   $request->product_pcs;
        $product->product_price            =   $request->product_price;
        $product->product_image            =   $imageurl;
        $product->product_description      =   $request->product_description;
        $product->save();
        return redirect()->back()->with('message','Product Create Successfully');
    }
    public function allproduct(){
        $allProducts=Product::all();
       return view('dashboard.allProduct',['allProducts'=>$allProducts]);
    }
    public function productedit($id){
        $product=Product::find($id);
        return view('dashboard.ProductEdit',['product'=>$product]);
    }
    public function productupdate(Request $request){
           $product=Product::find($request->id);
           $imageurl='';

        if($product_image=$request->file('product_image')){
            $imagetype=$product_image->getClientOriginalExtension();
            $imageName=time().'.'.$imagetype;
            $directory='images/';
            $product_image->move($directory,$imageName);
            $imageurl=$directory.$imageName;

        }
        else{
            $imageurl=$product->product_image;
        }


        $product->product_name             =   $request->product_name;
        $product->product_pcs	           =   $request->product_pcs;
        $product->product_price            =   $request->product_price;
        $product->product_image            =   $imageurl;
        $product->product_description      =   $request->product_description;
        $product->save();
        return redirect('/all-product')->with('message','product Update Successfully');

    }
    public function productremove($id){
      $product=Product::find($id);
      $product->delete();
      return redirect('/all-product')->with('message','product delete Successfully');
    }
    public function allcontact(){
        $allcontacts=Contact::all();
        return view('dashboard.allcontact',['allcontacts'=>$allcontacts]);
    }


}
