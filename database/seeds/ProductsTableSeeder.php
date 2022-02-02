<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config('products-test-list');

        foreach ($products as $product) {
            // New istance "Product" model
            $new_product = new Product();

            // Cols assignments
            $new_product->brand = $product['brand'];
            $new_product->name_product = $product['name_product'];
            $new_product->price = $product['price'];
            $new_product->price_detail = $product['price_detail'];
            $new_product->description = $product['description'];
            $new_product->thumb = $product['thumb'];
            $new_product->is_new = $product['is_new'];

            // Save
            $new_product->save();
        }
    }
}
