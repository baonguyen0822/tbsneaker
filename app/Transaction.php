<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transaction";

    public function oder(){
        return $this->hasMany('App\Oder','t_id','id');
    }
}
