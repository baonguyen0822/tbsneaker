<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand_label extends Model
{
    protected $table = "brand_label";
    
    public function product(){
        return $this->hasMany('App\Product','b_id','id');
    }
}
