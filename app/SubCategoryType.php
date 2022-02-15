<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoryType extends Model
{
    /**
     * TABLE NAME
     */
    protected $table = 'sub_category_types';

    /**
     * FILLABLE
     */
    protected $fillable = [
        'name'
    ];

    /**
     * RELATIONS
     */
    // sub_category_types - sub_categories (one to many)
    public function subCategory() {
        return $this->belongsTo('App\SubCategory');
    }

    // sub_category_types - products (many to one)
    public function products() {
        return $this->hasMany('App\Product');
    }
}
