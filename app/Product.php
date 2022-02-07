<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /**
     * MASS ASSIGNMENT
     */
    protected $fillable = [
        'brand',
        'name_product',
        'price',
        'price_detail',
        'description',
        'thumb',
        'is_new',
    ];


    /**
     * RELATIONS
     */
    // categories - products (one to many)
    public function category() {
        return $this->belongsTo('App\Category');
    }
  
    // soft deletes
    use SoftDeletes;
}
