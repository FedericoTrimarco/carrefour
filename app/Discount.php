<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    /**
     * TABLE NAME
     */
    protected $table = 'discounts';

    /**
     * FILLABLE
     */
    protected $fillable = [
        'price',
        'price_detail',
        'end_date'
    ];

    /**
     * RELATIONS
     */
    // discounts - products (one to many)
    public function product() {
        return $this->belongsTo('App\Product');
    }
}
