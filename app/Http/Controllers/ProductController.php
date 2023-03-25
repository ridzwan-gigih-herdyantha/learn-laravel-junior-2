<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductLogActivity;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store()
    {
        $product = Product::create([
            'name' => 'Tomat'
        ]);

    }
}
