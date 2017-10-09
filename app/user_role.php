<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\role;

class user_role extends Model
{
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }


    public function roles(){
        return $this->belongsTo(role::class,'role_id');
    }
}
