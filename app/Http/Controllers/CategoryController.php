<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    

    public function index() {
        $category = Category::all();
        return view('categories', [
            'categories' => $category,
            'active' => 'category',
            'title' => 'All Category'
        ]);
    }


    public function show(Category $categories , Request $request)
    {
        // dd('woi');
        // dd(Category::where('slug', $slug)->firstOrFail());;
        // dd($category);
        return view('category', [
            'active' => 'category' ,
            'title' => 'Single Category',
            'category' => $categories ,
        ]);
    }


}
