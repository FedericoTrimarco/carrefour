<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Brand;
use App\Category;
use App\ProductDescription;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $trash = Product::onlyTrashed()->get();
        return view('admin.products.index', compact('products', 'trash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate($this->rules_to_validate_store(), $this->error_messages());

        $data = $request->all();

        // Brand set
        $new_brand = new Brand();
        $new_brand->name = $data['brand'];
        $new_brand->save();
        $brand = Brand::where('name', $data['brand'])->first();

        // Save cover image in storage if exists
        if (array_key_exists('thumb', $data)) {
            $data['thumb'] = Storage::put('product-images', $data['thumb']);
        }

        // 1. new instance of Product
        $new_product = new Product();
        $new_product['brand_id'] = $brand['id'];
        
        if (array_key_exists('is_new', $data)) {
            $data['is_new'] = 1;
        } else{
            $data['is_new'] = 0;
        }

        // gen slug univoco
        $slug = Str::slug($data['name'], '-');
        $count = 2;
        $base_slug = $slug;

        while (Product::where('slug', $slug)->first()) {
            $slug = $base_slug . '-' . $count;
            $count++;
        }

        $data['slug'] = $slug;

        // 2. set properties
        $new_product->fill($data);

        // 3. save in 'products' table
        $new_product->save();

        // 4. redirect to products.show
        return redirect()->route('admin.products.show', $new_product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        if(! $product) {
            abort(404);
        }
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate($this->rules_to_validate_update(), $this->error_messages());

        $data = $request->all();

        if (array_key_exists('is_new', $data)) {
            $data['is_new'] = 1;
        } else{
            $data['is_new'] = 0;
        }

        // Substitute product image if exist in form
        if (array_key_exists('thumb', $data)) {
            Storage::delete($product->thumb);
            $data['thumb'] = Storage::put('product-images', $data['thumb']);
        }
        
        if ($data['name'] != $product->name) {
            $slug = Str::slug($data['name'], '-');
            $count = 2;
            $base_slug = $slug;

            while (Product::where('slug', $slug)->first()) {
                $slug = $base_slug . '-' . $count;
                $count++;
            }

            $data['slug'] = $slug;
        } else {
            $data['slug'] = $product->slug;
        }

        $product->update($data);

        return redirect()->route('admin.products.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('deleted', $product->name_product);
    }

    public function getTrash()
    {
        $trashed = Product::onlyTrashed()->get();
        return view('admin.products.trash', compact('trashed'));
    }

    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();
        return redirect()->route('admin.products.index');
    }    

    public function forceDelete($id) {
        $product = Product::withTrashed()->find($id);
        Storage::delete($product->thumb);
        $product->forceDelete();

        return redirect()->route('admin.products.index');
    }

    private function rules_to_validate_store() {
        return [
            'brand' => 'required',
            'name' => 'required',
            'price' => 'required',
            'price_detail' => 'required',
            'description' => 'required',
            'thumb' => 'required|file|mimes:jpeg,jpg,png',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    private function rules_to_validate_update() {
        return [
            'brand' => 'required',
            'name' => 'required',
            'price' => 'required',
            'price_detail' => 'required',
            'description' => 'required',
            'thumb' => 'file|mimes:jpeg,jpg,png',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    private function error_messages() {
        return [
            'required' => "Field ':attribute' is required",
            'thumb.required' => "È obbligatorio caricare un'immagine!"
        ];
    }
}
