<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "admin";
    
    public function checkAdmin($email, $password)
    {
        $MD5= md5($password);
        $admin = self::where('email', $email)->where('pass', $MD5)->where('status', 1)->first();
        if($admin)
        {
            return($admin);
        }

    }
    
}
