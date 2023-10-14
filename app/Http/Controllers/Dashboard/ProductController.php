<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     *  Display All Product
     * */
    public function index()
    {
        $products = Product::get();
        return view('backend.product.index', compact('products'));
    }
    /**
     * Display Product Crate Page
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.addNewProduct', compact('categories'));
    }
    /**
     * Store Product
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'category_id' => 'required',
            'price' => 'required',
            'thumnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'upload_files' => 'nullable|mimes:zip,pdf',

        ]);
        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'category_id' => $request->category_id,
            'tags' => json_encode($request->tags),
            'description' => $request->product_description,
            'status' => $request->has('active_status') ? 1 : 0,
            'price' => $request->price,
            'discount' => $request->discount,
            'highlight' => $request->highlight,
            'seo_title' => Str::slug($request->seo_title, '-'),
            'seo_description' => $request->seo_description,
        ]);
        if ($request->hasFile('thumbnail')) {
            $thumbnail_file = $request->file('thumbnail');
            $thumbnail_filename = time() . '_' . uniqid() . '.' . $thumbnail_file->getClientOriginalExtension();
            $thumbnail_file->move('storage/images/product/thumbnail', $thumbnail_filename);
            $product->thumnail_image = 'storage/images/product/thumbnail/' . $thumbnail_filename;
        }
        if ($request->hasFile('upload_files')) {
            $upload_file = $request->file('upload_files');
            $upload_file_filename = time() . '_' . uniqid() . '.' . $upload_file->getClientOriginalExtension();
            $upload_file->move('storage/product/upload_files', $upload_file_filename);
            $product->upload_file = 'storage/product/upload_files/' . $upload_file_filename;
        }

        $product->save();
        return redirect()->back()->with('message', 'Product Create Successfully');
    }

    public function allproduct()
    {
        $allProducts = Product::all();
        return view('dashboard.allProduct', ['allProducts' => $allProducts]);
    }
    public function productedit($id)
    {
        $product = Product::find($id);
        return view('dashboard.ProductEdit', ['product' => $product]);
    }
    public function productupdate(Request $request)
    {
        $product = Product::find($request->id);
        $imageurl = '';

        if ($product_image = $request->file('product_image')) {
            $imagetype = $product_image->getClientOriginalExtension();
            $imageName = time() . '.' . $imagetype;
            $directory = 'images/';
            $product_image->move($directory, $imageName);
            $imageurl = $directory . $imageName;
        } else {
            $imageurl = $product->product_image;
        }


        $product->product_name             =   $request->product_name;
        $product->product_pcs               =   $request->product_pcs;
        $product->product_price            =   $request->product_price;
        $product->product_image            =   $imageurl;
        $product->product_description      =   $request->product_description;
        $product->save();
        return redirect('/all-product')->with('message', 'product Update Successfully');
    }
    public function productremove($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/all-product')->with('message', 'product delete Successfully');
    }
    public function allcontact()
    {
        $allcontacts = Contact::all();
        return view('dashboard.allcontact', ['allcontacts' => $allcontacts]);
    }
}
