<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetFkProductsDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products_descriptions', function (Blueprint $table) {
            // Definition FK products table
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');

            // Definition FK products_descriptions_types table
            $table->foreign('description_type_id')->references('id')->on('products_descriptions_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products_descriptions', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['description_type_id']);
        });
    }
}
