<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  /**
   * TABLE NAME
   */
  protected $table = 'reviews';

  /**
   * FILLABLE
   */
  protected $fillable = [
    'product_id',
    'author',
    'description',
    'email',
    'rate'
  ];

  /**
   * RELATIONS
   */
  //  reviews - products (many to one)
     public function product() {
        return $this->belongsTo('App\Product');
    }
}
