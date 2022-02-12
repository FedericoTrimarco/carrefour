<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
    /**
     * TABLE NAME
     */
    protected $table = 'products_descriptions';

    /**
     * FILLABLE
     */
    protected $fillable = [
        'content'
    ];

    /**
     * RELATIONS
     */
    // products_descriptions - products (many to one)
    public function products() {
        return $this->belongsTo('App\Product');
    }

    public function productDescriptionTypes() {
        return $this->belongsTo('App\ProductDescriptionType');
    }
}
