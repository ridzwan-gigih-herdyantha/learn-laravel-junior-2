<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Events\ProductCreated;
use App\Models\ProductLogActivity;

class ProductController extends Controller
{
    public function store()
    {
        $product = Product::create([
            'name' => 'Ngawi'
        ]);

        ProductCreated::dispatch($product);
    }
}
