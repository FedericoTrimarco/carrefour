<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * TABLE NAME
     */
    protected $table = 'categories';

    /**
     * FILLABLE
     */
    protected $fillable = [
        'name',
    ];
    
    /**
     * RELATIONS
     */
    // categories - sub_categories (one to many)
    public function subCategories() {
        return $this->hasMany('App\SubCategory');
    }

    // categories - products (one to many)
    public function products() {
        return $this->hasMany('App\Product');
    }
}
