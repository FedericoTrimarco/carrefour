<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

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
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
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
        $request->validate( $this->rules_to_validate(), $this->error_messages() );

        $data = $request->all();
        // dd($data);
        // 1. new instance of Product
        $new_product = new Product();

        if (array_key_exists('is_new', $data)) {
            $data['is_new'] = 1;
        } else{
            $data['is_new'] = 0;
        }

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
        if(! $product) {
            abort(404);
        }
        return view('admin.products.edit', compact('product'));
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
        $request->validate( $this->rules_to_validate(), $this->error_messages() );

        $data = $request->all();

        if (array_key_exists('is_new', $data)) {
            $data['is_new'] = 1;
        } else{
            $data['is_new'] = 0;
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
        return view('products.trash', compact('trashed'));
    }

    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();
        return redirect()->route('products.index');
    }    

    public function forceDelete($id) {
        Product::withTrashed()->find($id)->forceDelete();

        return redirect()->route('products.index');
    }

    public function rules_to_validate() {
        return [
            'brand' => 'required',
            'name_product' => 'required',
            'price' => 'required',
            'description' => 'required',
            'thumb' => 'required',
        ];
    }

    public function error_messages() {
        return [
            'required' => "Field ':attribute' is required"
        ];
    }
}
