<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  //  review - Produtc
     public function review() {
        return $this->belongsTo('App\Product');
    }
}
