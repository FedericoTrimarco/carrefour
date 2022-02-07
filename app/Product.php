<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $fillable = [
        'brand',
        'name_product',
        'price',
        'price_detail',
        'description',
        'thumb',
        'is_new',
    ];

    use SoftDeletes;
}
