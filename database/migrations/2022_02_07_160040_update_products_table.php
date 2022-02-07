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
            
            //Colonna per FK
            $table->unsignedBigInteger('reviews_id')->nullable()->after('id');

            // Definizione FK

            $table->foreign('reviews_id')
                  ->references('id')
                  ->on('reviews')
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
            $table->dropForeign('products_reviews_id_foreign');
            $table->dropColumn('reviews_id');
        });
    }
}
