<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Definizione FK categories table
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null');

            // Definizione FK sub_categories table
            $table->foreign('sub_category_id')
                ->references('id')
                ->on('sub_categories')
                ->onDelete('set null');

            // Definizione FK sub_category_types table
            $table->foreign('sub_category_type_id')
                ->references('id')
                ->on('sub_category_types')
                ->onDelete('set null');

            // Definizione FK brands table
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
            $table->dropForeign('products_sub_category_id_foreign');
            $table->dropForeign('products_sub_category_type_id_foreign');
            $table->dropForeign('products_brand_id_foreign');
        });
    }
}
