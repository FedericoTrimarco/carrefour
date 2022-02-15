<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        return response()->json($products);
    }

    public function show($slug){
        $product = Product::where('slug', $slug)->with(['brand', 'reviews'])->get();
        // if (! $product) {
        //     $product['not_found'] = true;
        // }
        return response()->json($product);
    }
}
