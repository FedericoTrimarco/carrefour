<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('brand')->get();
        foreach($products as $product) {
            $product->thumb = url('storage/' . $product->thumb);
        }

        return response()->json($products);
    }

    public function show($slug){
        $product = Product::where('slug', $slug)->with(['brand'])->first();
        $product->load(['reviews'=>function($r) {$r->orderBy('id', 'desc');}]);
        if (! $product) {
            $product['not_found'] = true;
        } elseif ($product) {
            $product->thumb = url('storage/' . $product->thumb);
        }
        return response()->json($product);
    }
}
