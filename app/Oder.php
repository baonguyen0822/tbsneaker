<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oder extends Model
{
    protected $table = "oder";
    
    public function product(){
        return $this->belongsTo('App\Product','p_id','id');
    }

    public function transaction(){
        return $this->belongsTo('App\Transaction','t_id','id');
    }
}
