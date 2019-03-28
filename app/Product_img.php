<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_img extends Model
{
    protected $table = "product_img";

    public function product(){
        return $this->hasOne('App\Product','id','id');
   }
}
