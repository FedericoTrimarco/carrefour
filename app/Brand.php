<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * TABLE NAME
     */
    protected $table = 'brands';

    /**
     * FILLABLE
     */
    protected $fillable = [
        'name'
    ];

    /**
     * RELATIONS
     */
    // brands - products (one to many)
    public function products() {
        return $this->hasMany('App\Product');
    }
}
