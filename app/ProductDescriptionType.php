<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDescriptionType extends Model
{
    /**
     * TABLE NAME
     */
    protected $table = 'products_descriptions_types';

    /**
     * FILLABLE
     */
    protected $fillable = [
        'name'
    ];

    /**
     * RELATIONS
     */
    // products_descriptions_types - products_descriptions (one to many)
    public function productDescriptions() {
        return $this->hasMany('App\ProductDescription');
    }
}
