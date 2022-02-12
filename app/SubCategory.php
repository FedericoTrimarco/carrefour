<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    /**
     * TABLE NAME
     */
    protected $table = 'sub_categories';

    /**
     * FILLABLE
     */
    protected $fillable = [
        'name'
    ];

    /**
     * RELATIONS
     */
    // sub_categories - categories (many to one)
    public function category() {
        return $this->belongsTo('App\Category');
    }

    // sub_categories - products (one to many)
    public function products() {
        return $this->hasMany('App\Product');
    }

    // sub_categories - sub_category_types (one to many)
    public function subCategoryTypes() {
        return $this->hasMany('App\SubCategoryType');
    }
}
