<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_size extends Model
{
    protected $table = "product_size";

    public function product(){
        return $this->belongsTo('App\Product','p_id','id');
   }
}
