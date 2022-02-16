<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models import
use App\Category;
use App\Product;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();

        return response()->json($categories);
    }

    public function show($slug) {
        //$product = Product::all()->with('brand');
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $category->id)->with('brand')->get();
        if (! $products) {
            $products['not_found'] = true;
        } elseif ($products) {
            foreach ($products as $product) {
                $product->thumb = url('storage/' . $product->thumb);
            }
        }

        return response()->json([
            'category' => $category,
            'products' => $products,
        ]);
    }
}
