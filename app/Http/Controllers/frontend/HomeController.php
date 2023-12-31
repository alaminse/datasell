<?php
namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Contact;
use App\Models\Post;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $allProducts=Product::get();
        return view('frontend.Home',['allProducts'=>$allProducts]);
    }
    public function aboutUs(){
        return view('frontend.aboutus');
    }
    public function contactUs(){
        return view('frontend.contactus');
    }

    public function singleProduct($id){
        $product=Product::find($id);
        return view('frontend.singleProduct',['product'=>$product]);
    }
    public function blog(){
        $posts=Post::all();
        return view('frontend.blog',['posts'=>$posts]);
    }
    public function singlepost($slug){

        $post=Post::where('slug',$slug)->first();
        return view('frontend.singleBlog',['post'=>$post]);
    }

    public function contactstore(Request $request){
          $contact=new Contact();
          $contact->name=$request->name;
          $contact->email=$request->email;
          $contact->phone=$request->phone;
          $contact->message=$request->message;
          $contact->save();
          return redirect()->back()->with('message','thanks for contact us we back as soon as');
    }

    public function search(Request $request){


        $allProducts =Product::where('product_name', 'like', '%' .$request->search . '%')
        ->paginate(9);


        // if (request('search')) {

        //       return view('frontend.',['allProducts'=>$allProducts]);
        // }
        return view('frontend.search',['allProducts'=>$allProducts]);
    }


}
