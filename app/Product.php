<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /**
     * TABLE NAME
     */
    protected $table = 'products';

    /**
     * MASS ASSIGNMENT
     */
    protected $fillable = [
        'category_id',
        // 'sub_category_id',
        // 'sub_category_type_id',
        'brand_id',
        'name',
        'price',
        'price_detail',
        'thumb',
        'is_new',
        'slug',
    ];

    /**
     * RELATIONS
     */
    // categories - products (many to one)
    public function category() {
        return $this->belongsTo('App\Category');
    }

    // sub_categories - products (many to one)
    public function subCategory() {
        return $this->belongsTo('App\SubCategory');
    }

    // sub_category_types - products (many to one)
    public function subCategoryType() {
        return $this->belongsTo('App\SubCategoryType');
    }
        
    // brands - products (many to one)
    public function brand() {
        return $this->belongsTo('App\Brand');
    }
    
    // products - reviews (one to many)
    public function reviews() {
        return $this->hasMany('App\Review');
    }

    // products - discounts (one to many)
    public function discounts() {
        return $this->hasMany('App\Discount');
    }

    // products - products_descriptions (one to many)
    public function productDescriptions() {
        return $this->hasMany('App\ProductDescription');
    }
  
    /**
     * SOFT DELETES
     */
    use SoftDeletes;
}
