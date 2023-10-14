<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('backend.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:200|unique:categories,name'
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $validated = $validator->validated();
        $validated['slug'] = Str::slug($validated['name']);

        $done = Category::create($validated);

        if(!$done) return redirect()->back()->with('error', 'Category not Created. Try Again!!!');
        return redirect()->back()->with('success', 'Category Create Successfully');
    }
}
