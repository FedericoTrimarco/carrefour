<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}