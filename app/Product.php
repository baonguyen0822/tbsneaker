<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";

    public function category(){
         return $this->belongsTo('App\Category','c_id','id');
    }

    public function brand_label(){
        return $this->belongsTo('App\Brand_label','b_id','id');
   }

    public function oder(){
        return $this->hasMany('App\Oder','p_id','id');
    }

    public function product_img(){
        return $this->hasOne('App\Product_img','id','id');
    }

    public function product_size(){
        return $this->belongsTo('App\Product_size','p_id','id');
   }

}
